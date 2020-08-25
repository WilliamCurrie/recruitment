<?php

require __DIR__."/../vendor/autoload.php";

/** Boot Container */
$container = require __DIR__.'/config/di/definitions.php';
/** Boot Eloquent */
$connection = $container->get(\Framework\Connection::class);
/** Boot Routing */
$router = $container->get(\Framework\Router::class);

