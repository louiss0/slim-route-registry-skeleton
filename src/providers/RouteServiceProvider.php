<?php

declare(strict_types=1);

namespace Src\Providers;

use Src\Utils\Classes\RouteGroup;
use Louiss0\SlimRouteRegistry\RouteRegistry;

class RouteServiceProvider extends ServiceProvider
{


    public function register()
    {
        RouteRegistry::setup($this->getApp());

        $this->bindToContainer(RouteGroup::class, function () {

            return new RouteGroup($this->getApp());
        });
    }


    public function boot()
    {

        $this->apiRouteGroup()->register();
    }



    public function apiRouteGroup(): RouteGroup
    {
        # code...
        $api_routes = routes_path("api.php");



        $api_group = $this->resolve(RouteGroup::class);

        $api_group
            ->setRoutesFile($api_routes)
            ->setPrefix("/api");

        return $api_group;
    }
}
