<?php

use DI\Container;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Mfisher\Controllers\CustomerController;
use Mfisher\Entities\Booking;
use Mfisher\Entities\Customer;
use Mfisher\Repositories\BookingRepository;
use Mfisher\Services\BookingService;
use Mfisher\Services\CustomerService;

return [
    EntityManager::class => function() {
        $paths = [__DIR__ . '/../src/Entities/'];
        $isDevMode = $_ENV['IS_DEV'];

        // the connection configuration
        $dbParams = array(
            'driver'   => $_ENV['DB_DRIVER'],
            'user'     => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'dbname'   => $_ENV['DB_DATABASE'],
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT']
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        return EntityManager::create($dbParams, $config);
    },
    Mustache_Engine::class => function() {
        return new Mustache_Engine([
            'entity_flags' => ENT_QUOTES,
            'cache' => '/tmp/cache/mustache',
            'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
            'cache_lambda_templates' => true,
            'loader' => new Mustache_Loader_FilesystemLoader(__DIR__.'/../src/Templates'),
            'partials_loader' => new Mustache_Loader_FilesystemLoader(__DIR__.'/../src/Templates/partials'),
            'charset' => 'utf-8',
            'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
            'strict_callables' => true,
            'pragmas' => [Mustache_Engine::PRAGMA_FILTERS],
        ]);
    },
    BookingService::class => function(Container $c) {
        /** @var EntityManager */
        $entityManager = $c->get(EntityManager::class);

        return new BookingService($entityManager->getRepository(Booking::REPOSITORY_NAME));
    },
    CustomerService::class => function(Container $c) {
        /** @var EntityManager */
        $entityManager = $c->get(EntityManager::class);

        return new CustomerService($entityManager->getRepository(Customer::REPOSITORY_NAME));
    },
    CustomerController::class => function(Container $c) {
        return new CustomerController($c->get(CustomerService::class), $c->get(BookingService::class), $c->get(Mustache_Engine::class));
    }
];