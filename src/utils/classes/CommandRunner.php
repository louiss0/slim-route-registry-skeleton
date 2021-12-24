<?php

namespace Src\Utils\Classes;

use Src\Utils\Classes\Console;
use Symfony\Component\Console\Application;

final class CommandRunner  extends Console
{


    protected static array $commands;
    protected  static Application  $application;

    static function init()
    {
        # code...

        static::$commands = require config_path("commands.php");



        static::$application = new Application();
    }



    public static function registerAndRunAllCommands()
    {
        # code...


        collect(static::getCommands())->each(
            function ($command) {
                # code...
                if (gettype($command) === "string") {
                    # code...

                    return static::$application->add(new $command);
                }

                static::$application->add($command);
            }
        );



        static::$application->run();
    }

    /**
     * Get the value of commands
     */
    public static function getCommands()
    {
        return self::$commands;
    }
}
