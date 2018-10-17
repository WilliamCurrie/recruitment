<?php

include '../vendor/autoload.php';

use Start\Application;

function exception_handler(Exception $exception) {
    echo 'Uncaught exception: ' . $exception->getMessage() . PHP_EOL;
    // Make sure all resources are unset
    Application::unsetDBMSConnection();
    Application::unsetContainer();
}

set_exception_handler('exception_handler');

// Load configurations
Application::bootstrap();

// Run application
Application::run();
