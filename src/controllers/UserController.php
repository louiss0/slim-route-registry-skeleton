<?php

declare(strict_types=1);

namespace Src\Controllers;

use Psr\Http\Message\ResponseInterface;

use Slim\Http\Response;

use Slim\Http\ServerRequest;

use Src\Services\View;

use Src\Types\Enums\CommonHTTPStatusCodes;
use Src\Types\Interfaces\{UserRepositoryInterface};

class UserController
{


    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {
    }

    public function index()
    {
        # code...

        $user = $this->userRepository->getOne(1);


        return;
    }

    public function show(Response $response, int $id): ResponseInterface
    {
        # code...

        return $response->withJson(
            data: [
                "status" => "success",
                "message" => " ",
                "data" => []
            ]
        );
    }


    public function store(ServerRequest $request, Response $response)
    {
        # code...


        return $response->withJson(
            data: [
                "status" => "success",
                "message" => "User is created ",
                "data" => []
            ],
            status: CommonHTTPStatusCodes::CREATED
        );
    }


    public function update(Response $response,): ResponseInterface
    {


        return $response->withJson(
            data: [
                "status" => "success",
                "message" => "User is created ",
                "data" => []
            ],
        );
    }

    public function destroy(Response $response, int $id)
    {
        # code...




        return $response->withJson(
            data: [
                "status" => "success",
                "message" => "User is deleted"
            ]
        );
    }
}
