<?php

use DI\Bridge\Slim\Bridge;
use Psr\Http\Message\ResponseInterface;
use Slim\Factory\ServerRequestCreatorFactory;
use Slim\Http\Factory\DecoratedResponseFactory;
use Slim\Psr7\Factory\StreamFactory;
use Src\Providers\ServiceProvider;
use Src\Utils\Handlers\HttpErrorHandler;
use Src\Utils\Handlers\ShutdownHandler;
use Zeuxisoo\Whoops\Slim\WhoopsMiddleware;



require_once __DIR__ . "/../../vendor/autoload.php";
$app = Bridge::create();


$error_options = require_once config_path("error-options.php");

$providers =  require_once config_path("providers.php");

$app->options("/{routes:.+}", fn (ResponseInterface $response) => $response);


$app->addBodyParsingMiddleware();



$app->addRoutingMiddleware();





$callableResolver = $app->getCallableResolver();
$responseFactory = $app->getResponseFactory();

$decoratedResponseFactory = new DecoratedResponseFactory(
    $responseFactory,
    new StreamFactory
);



$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();


$errorHandler = new HttpErrorHandler($callableResolver, $decoratedResponseFactory);

$shutdownHandler = new ShutdownHandler(
    $request,
    $errorHandler,
    $error_options["displayErrorDetails"]
);


register_shutdown_function($shutdownHandler);

ServiceProvider::setup($app, $providers);





if (env("PHP_ENV") === "development") {


    $app->add(new WhoopsMiddleware());
} else {


    $app->addErrorMiddleware(
        $error_options["displayErrorDetails"],
        $error_options["logErrors"],
        $error_options["logErrorDetails"],
    );
}

return $app;
