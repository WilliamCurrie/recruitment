<?php

use DI\ContainerBuilder;
use Booking\Model\CustomerRepository;
use Booking\Model\BookingRepository;
require __DIR__ . '/../vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(__DIR__ . '/config.php');
$container = $containerBuilder->build();
return $container;