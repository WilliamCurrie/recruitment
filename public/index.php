<?php

use Klein\Klein;
use App\Repositories\Contracts\BookingRepositoryContract;
use App\Repositories\Contracts\CustomerRepositoryContract;

require_once __DIR__ . '/../vendor/autoload.php';
$container = require_once __DIR__ . '/../bootstrap/app.php';

$router = new Klein();

$router->respond('get', '/customers', function () use ($container) {
    /** @var CustomerRepositoryContract $repository */
    $repository = $container->get(CustomerRepositoryContract::class);
    $twig = $container->get('Twig');

    $allCustomers = $repository->getAllCustomers();
    $customersSortedBySurname = $repository->getAllCustomersSortedBySurname();

    echo $twig->render('customers.phtml', [
        'allCustomers' => $allCustomers,
        'customersSortedBySurname' => $customersSortedBySurname
    ]);
});

$router->respond('get', '/bookings', function () use ($container) {
    /** @var BookingRepositoryContract $repository */
    $repository = $container->get(BookingRepositoryContract::class);
    $twig = $container->get('Twig');

    $bookings = $repository->getAllBookings();

    echo $twig->render('bookings.phtml', [
        'bookings' => $bookings,
    ]);
});

$router->respond('get', '/', function () use ($container) {
    $twig = $container->get('Twig');

    echo $twig->render('welcome.phtml');
});

$router->dispatch();
