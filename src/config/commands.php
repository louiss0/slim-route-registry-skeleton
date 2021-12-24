<?php

use Src\Commands\{
    ClearLogsCommand,
    MakeAttributeCommand,
    MakeClassCommand,
    MakeCommandCommand,
    MakeControllerCommand,
    MakeInterfaceCommand,
    MakeMiddlewareCommand,
    MakeModelCommand,
    MakeRepositoryCommand,
    MakeServiceCommand,
    MakeServiceProviderCommand,
    MakeTraitCommand,
    ViewClearCommand,
};

return [
    ViewClearCommand::class,
    ClearLogsCommand::class,
    MakeCommandCommand::class,
    MakeModelCommand::class,
    MakeServiceProviderCommand::class,
    MakeModelCommand::class,
    MakeClassCommand::class,
    MakeTraitCommand::class,
    MakeInterfaceCommand::class,
    MakeServiceCommand::class,
    MakeControllerCommand::class,
    MakeAttributeCommand::class,
    MakeMiddlewareCommand::class,
    MakeRepositoryCommand::class,
];
