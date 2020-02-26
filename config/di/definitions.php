<?php

use App\Entities\Booking;
use App\Entities\Customer;
use Psr\Container\ContainerInterface;
use App\Repositories\BookingEntityRepository;
use App\Repositories\CustomerEntityRepository;
use App\Repositories\Contracts\BookingRepositoryContract;
use App\Repositories\Contracts\CustomerRepositoryContract;

$entityManager = require_once __DIR__ . '/../../bootstrap/doctrine.php';
$twig = require_once __DIR__ . '/../../bootstrap/twig.php';

return [
    'DoctrineOrmEntityManager' => $entityManager,
    'Twig' => $twig,
    CustomerEntityRepository::class => DI\factory(function (ContainerInterface $container) {
        return $container->get('DoctrineOrmEntityManager')->getRepository(Customer::class);
    }),
    CustomerRepositoryContract::class => DI\get(CustomerEntityRepository::class),
    BookingEntityRepository::class => DI\factory(function (ContainerInterface $container) {
        return $container->get('DoctrineOrmEntityManager')->getRepository(Booking::class);
    }),
    BookingRepositoryContract::class => DI\get(BookingEntityRepository::class)
];
