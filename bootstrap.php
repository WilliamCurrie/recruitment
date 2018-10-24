<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Controller\BookingsController;
use function DI\autowire;
use Controller\CustomersController;
use DI\ContainerBuilder;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Model\Gateway\Bookings\BookingFormatterApi;
use Model\Gateway\Bookings\BookingsGateway;
use Model\Gateway\Bookings\UseCase\ApiFormatBooking;
use Model\Gateway\Bookings\UseCase\GetAllBookings;
use Model\Gateway\Bookings\UseCase\GetBookingsByCustomerId;
use Model\Gateway\Customers\CustomerFormatterApi;
use Model\Gateway\Customers\CustomerPayloadForPutValidator;
use Model\Gateway\Customers\CustomerPayloadMapper;
use Model\Gateway\Customers\CustomersGateway;
use Model\Gateway\Customers\UseCase\ApiFormatCustomer;
use Model\Gateway\Customers\UseCase\GetAllCustomers;
use Model\Gateway\Customers\UseCase\GetAllCustomersSortedBySecondName;
use Model\Gateway\Customers\UseCase\GetCustomerById;
use Model\Gateway\Customers\UseCase\InsertNewCustomerInterface;
use Model\Gateway\Customers\UseCase\MapCustomerPayload;
use Model\Gateway\Customers\UseCase\ValidateCustomerPayloadForPut;
use Model\Helpers\Http\InputSanitizer;

// Doctrine Entity Manager ---------------------------------------------------------------------------------------------
$isTestMode = (isset($_ENV['APP_ENV'])) && ($_ENV['APP_ENV'] === 'test');

$config = Setup::createYAMLMetadataConfiguration([__DIR__ . "/config/yaml"], true);

// database configuration parameters
if ($isTestMode) {
    $conn = [
        'driver' => 'pdo_mysql',
        'user' => 'testuser',
        'password' => 'password',
        /** ToDo: Give it a different name than the DEV database, and create on the fly for tests  */
        'dbname' => 'test',
        'host' => 'database',
        'port' => '3306'
    ];
} else {
    // ToDo: Make changes to accept PROD mode too. Assumed DEV mode
    $conn = [
        'driver' => 'pdo_mysql',
        'user' => 'testuser',
        'password' => 'password',
        'dbname' => 'test',
        'host' => 'database',
        'port' => '3306'
    ];
}
try {
// obtaining the entity manager
    $entityManager = EntityManager::create($conn, $config);
} catch (ORMException $ore) {
    die('Unable to instantiate the entity manager');
}

// Dependency Injection Container setup --------------------------------------------------------------------------------
try {
    $containerBuilder = new ContainerBuilder();
    $containerBuilder->useAutowiring(true);

    $customersGateway = new CustomersGateway($entityManager);
    $bookingsGateway = new BookingsGateway($entityManager);

    // ToDo: It would be nice to have the injection definitions in a different dedicated file. Just saying...
    $containerBuilder->addDefinitions(
        [
            CustomersController::class => autowire(CustomersController::class),
            BookingsController::class => autowire(BookingsController::class),
            GetAllCustomers::class => $customersGateway,
            ApiFormatCustomer::class => autowire(CustomerFormatterApi::class),
            GetAllCustomersSortedBySecondName::class => $customersGateway,
            InputSanitizer::class => autowire(InputSanitizer::class),
            MapCustomerPayload::class => autowire(CustomerPayloadMapper::class),
            ValidateCustomerPayloadForPut::class => autowire(CustomerPayloadForPutValidator::class),
            InsertNewCustomerInterface::class => $customersGateway,
            GetCustomerById::class => $customersGateway,
            GetBookingsByCustomerId::class => $bookingsGateway,
            ApiFormatBooking::class => autowire(BookingFormatterApi::class),
            GetAllBookings::class => $bookingsGateway,
            'entity.manager' => $entityManager
        ]
    );
    $container = $containerBuilder->build();
} catch (\Exception $e) {
    die('Unable to setup dependency injection container: ' . $e->getMessage());
}
