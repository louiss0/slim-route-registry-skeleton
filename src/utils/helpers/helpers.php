<?php


/* Global Helper Functions */

use Illuminate\Support\Collection;
/*
 * asset
 * redirect
 * collect
 * factory
 * env
 * base_path
 * types_path
 * config_path
 * resources_path
 * public_path
 * routes_path
 * storage_path
 * app_path
 * class_basename
 */



if (!function_exists("factory")) {
    # code...

    function factory(string $model, $count = 1)
    {
        # code...

        $factory = new Factory;

        return $factory(
            $model,
            $count
        );
    }
}


if (!function_exists("collect")) {


    function collect(mixed $value)
    {
        return new Collection($value);
    }
}


if (!function_exists('asset')) {


    function asset($path)
    {
        return env('APP_URL') . "/{$path}";
    }
}


if (!function_exists('env')) {

    function env($key, $default = false)
    {
        $value = getenv($key);


        throw_unless(
            !$value and !$default,
            RuntimeException::class,
            "{$key} is not a defined .env variable and has not default value"
        );

        return $value or $default;
    }
}


if (!function_exists('base_path')) {
    function base_path($path = '')
    {

        return  __DIR__ . "/../../../{$path}";
    }
}


if (!function_exists('database_path')) {
    function database_path($path = '')
    {
        return base_path("database/{$path}");
    }
}


if (!function_exists('config_path')) {

    function config_path($path = '')
    {

        return base_path("config/{$path}");
    }
}


if (!function_exists('storage_path')) {

    function storage_path($path = '')
    {
        return base_path("storage/{$path}");
    }
}

if (!function_exists('public_path')) {
    function public_path($path = '')
    {
        return base_path("public/{$path}");
    }
}


if (!function_exists('resources_path')) {
    function resources_path($path = '')
    {
        return base_path("resources/{$path}");
    }
}

if (!function_exists('routes_path')) {
    function routes_path($path = '')
    {
        return base_path("routes/{$path}");
    }
}



if (!function_exists("utils_path")) {


    function utils_path($path = "")
    {
        # code...

        return base_path("utils/{$path}");
    }
}

if (!function_exists('clear_directory')) {
    function clear_directory(string $directory)
    {
        # code...

        $directory = new DirectoryIterator(
            $directory
        );

        foreach ($directory as $file) {

            if (!$file->isDot()) {
                # code...
                unlink($file->getPathname());
            }
        }
    } # code...
}


if (!function_exists('class_basename')) {
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists("types_path")) {
    # code...



    function types_path($path = "")
    {
        # code...

        return base_path("types/{$path}");
    }
}
