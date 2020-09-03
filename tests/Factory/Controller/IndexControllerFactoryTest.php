<?php

namespace ApplicationTest\Factory\Controller;

use Application\Controller\IndexController;
use Application\Factory\Controller\IndexControllerFactory;
use Application\Repository\BookingRepository;
use Application\Repository\CustomerRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class IndexControllerFactoryTest
 *
 * @package ApplicationTest\Factory\Controller
 */
class IndexControllerFactoryTest extends TestCase
{
    /** @var array $config */
    protected $config;

    /**
     * @return void
     */
    public function setUp(): void
    {
        /**
         * Config can be overridden here for test or included from files in `_fixtures`
         * NB: credentials would never be stored here.
         */
        $this->config = [];
    }

    /**
     * Test class __construct() returns instance with DI
     */
    public function test__construct()
    {
        /**
         * NB: Normally I would provide a mock config and service via the Service Manager, for this exercise I will
         * accept a NULL mysqli instance and empty config which the Factory checks for as a workaround.
         */
        $factory = new IndexControllerFactory($this->config);
        $this->assertInstanceOf(
            BookingRepository::class,
            $factory->getBookingRepository(),
            "Booking Repository not present!"
        );
        $this->assertInstanceOf(
            CustomerRepository::class,
            $factory->getCustomerRepository(),
            "Customer Repository not present!"
        );
    }

    /**
     * Test that instance of Controller can be manually retrieve.
     * NB: Normally this sort of test would be to ensure that all the wiring and scaffolding of a framework is working
     * correctly and provides the classes we expect and need.
     */
    public function testGetController()
    {
        $factory = new IndexControllerFactory($this->config);
        $controller = $factory->getController();

        $this->assertInstanceOf(IndexController::class, $controller);
    }
}
