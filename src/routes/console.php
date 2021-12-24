<?php

use Src\Utils\Classes\CommandRunner;

require __DIR__ . '/../../vendor/autoload.php';



// ! make commands with required arguments here

CommandRunner::init();


CommandRunner::addCommand("make:example {name}", function () {


    assert($this instanceof CommandRunner);


    $this->setHelp("make a command with required arguments here")
        ->setDescription("This is a command with only one purpose show off");
});
