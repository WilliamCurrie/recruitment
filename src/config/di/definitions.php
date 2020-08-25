<?php

use DI\ContainerBuilder;
use Framework\Connection;
use Framework\Contracts\ConnectionContract;
use Framework\Contracts\RequestContract;
use Framework\Contracts\ViewContract;
use Framework\Request;
use Framework\View;
use \Wranx\Contracts\Repositories\BookingRepositoryContract;
use \Wranx\Repositories\BookingRepository;
use \Wranx\Contracts\Repositories\CustomerRepositoryContract;
use \Wranx\Repositories\CustomerRepository;
use Framework\Router;
use Framework\Contracts\RouterContract;
use Framework\Contracts\ConfigContract;
use Framework\Config;

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions([
    BookingRepositoryContract::class => DI\create(BookingRepository::class)
        ->constructor(DI\get(\Wranx\Models\Booking::class), DI\get(\Wranx\Models\Customer::class)),
    CustomerRepositoryContract::class => DI\create(CustomerRepository::class)
        ->constructor(DI\get(\Wranx\Models\Customer::class)),
    ConfigContract::class => DI\create(Config::class),
    RouterContract::class => DI\create(Router::class)->constructor(
        DI\create(Config::class)
    ),
    ConnectionContract::class => DI\create(Connection::class)->constructor(
        DI\create(Config::class)
    ),
    RequestContract::class => DI\create(Request::class),
    ViewContract::class => DI\create(View::class)->constructor(
        DI\create(Config::class)
    ),
]);

return $containerBuilder->build();