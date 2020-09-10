<?php

use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Mfisher\Controllers\CustomerController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';

//parse config
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$builder = new ContainerBuilder();

// Build container
$builder->addDefinitions(__DIR__ . '/../app/config.php');
$container = $builder->build();


$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;

// map a route
$router->map('GET', '/', function (ServerRequestInterface $request) use ($container) : ResponseInterface {
    return $container->get(CustomerController::class)->indexAction($request);
});

$router->map('GET', '/customer/{id}/bookings', function (ServerRequestInterface $request, array $args) use ($container) : ResponseInterface {
    return $container->get(CustomerController::class)->getCustomerBookingAction($request, $args);
});

$response = $router->dispatch($request);

// send the response to the browser
(new SapiEmitter)->emit($response);
