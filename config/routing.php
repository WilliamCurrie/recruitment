<?php

require_once dirname(__DIR__) . '/bootstrap.php';

use Controller\BookingsController;
use Controller\CustomersController;
use Klein\Klein;
use Symfony\Component\HttpFoundation\Request;
use Klein\Request as KRequest;

$routingLib = new Klein();
/** @var \DI\Container $container */
$container = $GLOBALS['container'];

// ToDo: Make authenticated requests to the API
$routingLib->respond(
    Request::METHOD_GET, '/customer', function (KRequest $request) use ($container) {
    /** @var CustomersController $c */
    $c = $container->get(CustomersController::class);

    return ($c->getAllCustomersAction($request));
});

$routingLib->respond(
    Request::METHOD_POST, '/customer', function (KRequest $request) use ($container) {
    /** @var CustomersController $c */
    $c = $container->get(CustomersController::class);

    return ($c->insertNewCustomerAction($request));
});

$routingLib->respond(
    Request::METHOD_OPTIONS, '/customer', function (KRequest $request) use ($container) {
    /** @var CustomersController $c */
    $c = $container->get(CustomersController::class);

    return ($c->optionsAction($request));
});

$routingLib->respond(Request::METHOD_GET, '/customer/[:customerId]/booking', function(KRequest $request) use ($container) {
    /** @var BookingsController $c */
    $c = $container->get(BookingsController::class);
    return ($c->getBookingsByCustomerIdAction($request));

});

$routingLib->respond(Request::METHOD_GET, '/booking', function(KRequest $request) use ($container) {
    /** @var BookingsController $c */
    $c = $container->get(BookingsController::class);
    return ($c->getAllBookingsAction($request));

});


$routingLib->dispatch();
