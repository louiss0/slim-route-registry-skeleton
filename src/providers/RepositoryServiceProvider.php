<?php

namespace Src\Providers;

use Src\Models\User;
use Src\Repositories\{
    UserRepository
};
use Src\Types\Interfaces\{
    UserRepositoryInterface
};

/**
 * Register Service Provider To Application within config/app.php
 */
class RepositoryServiceProvider extends ServiceProvider
{



    private array $repositories;


    public function register()
    {

        $this->repositories = [
            UserRepositoryInterface::class => new UserRepository(new User()),

        ];


        array_walk(
            callback: fn ($value, $key) =>
            $this->bindToContainer($key, fn () => $value),
            array: $this->repositories
        );
    }

    /**
     * After all register ServiceProviders Hooks complete, then
     * all boot ServiceProvider Hooks are executed
     */
    public function boot()
    {
        //
    }
}
