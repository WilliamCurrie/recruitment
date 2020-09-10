<?php

namespace Mfisher\Tests\Controllers;

use DateTime;
use Laminas\Diactoros\ServerRequest;
use Mfisher\Controllers\CustomerController;
use Mfisher\Entities\Booking;
use Mfisher\Entities\Customer;
use Mfisher\Services\BookingService;
use Mfisher\Services\CustomerService;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;
use Mustache_Logger_StreamLogger;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * CustomerController tests
 */
class CustomerControllerTest extends TestCase
{
    /**
     * @var Mustache_Engine
     */
    private $mustache;

    /**
     * @var CustomerService|MockObject
     */
    private $mockCustomerService;

    /**
     * @var BookingService|MockObject
     */
    private $mockBookingService;

    /**
     * Setup for tests
    */
    protected function setUp(): void
    {
        $this->mustache = new Mustache_Engine([
            'entity_flags' => ENT_QUOTES,
            'cache' => '/tmp/cache/mustache',
            'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
            'cache_lambda_templates' => true,
            'loader' => new Mustache_Loader_FilesystemLoader(__DIR__.'/../../src/Templates'),
            'partials_loader' => new Mustache_Loader_FilesystemLoader(__DIR__.'/../../src/Templates/partials'),
            'charset' => 'utf-8',
            'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
            'strict_callables' => true,
            'pragmas' => [Mustache_Engine::PRAGMA_FILTERS],
        ]);

        $this->mockCustomerService = $this->getMockBuilder(CustomerService::class)
            ->disableArgumentCloning()
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockBookingService = $this->getMockBuilder(BookingService::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->getMock();
    }

    /**
     * Test CustomerController::indexAction()
     */
    public function testIndexAction()
    {
        $mockCustomer = new Customer();
        $mockCustomer->setId(1)
            ->setFirstName('Bob')
            ->setSecondName('Mc Bob');

        $this->mockCustomerService->method('getAllCustomers')
            ->willReturn([$mockCustomer]);
        
        $customerController = new CustomerController($this->mockCustomerService, $this->mockBookingService, $this->mustache);
        $response = $customerController->indexAction($this->getReqesut());

        $this->assertStringEqualsFile(__DIR__ . '/results/customerNotEmpty.html', $response->getBody()->__toString());
    }

    /**
     * Test CustomerController::indexAction()
     */
    public function testIndexActionEmpty()
    {
        $this->mockCustomerService->method('getAllCustomers')
            ->willReturn([]);
        
        $customerController = new CustomerController($this->mockCustomerService, $this->mockBookingService, $this->mustache);
        $response = $customerController->indexAction($this->getReqesut());

        $this->assertStringEqualsFile(__DIR__ . '/results/customerEmpty.html', $response->getBody()->__toString());
    }

    /**
     * Test CustomerController::getCustomerBookingAction()
     */
    public function testGetCustomerBookingAction()
    {
        $mockCustomer = new Customer();
        $mockCustomer->setId(1)
            ->setFirstName('Bob')
            ->setSecondName('Mc Bob');

        $mockBooking = new Booking();
        $mockBooking->setId(1)
            ->setCustomer($mockCustomer)
            ->setBookingReference('foo')
            ->setBookingDate(new DateTime('01-01-2020'));

        $this->mockBookingService->method('getBookingsByCustomerId')
            ->willReturn([$mockBooking]);
        
        $customerController = new CustomerController($this->mockCustomerService, $this->mockBookingService, $this->mustache);
        $response = $customerController->getCustomerBookingAction($this->getReqesut(), ['id' => 1]);

        $this->assertStringEqualsFile(__DIR__ . '/results/bookingNotEmpty.html', $response->getBody()->__toString());
    }

    /**
     * Test CustomerController::getCustomerBookingAction()
     */
    public function testGetCustomerBookingActionEmpty()
    {
        $this->mockBookingService->method('getBookingsByCustomerId')
            ->willReturn([]);
        
        $customerController = new CustomerController($this->mockCustomerService, $this->mockBookingService, $this->mustache);
        $response = $customerController->getCustomerBookingAction($this->getReqesut(), ['id' => 1]);

        $this->assertStringEqualsFile(__DIR__ . '/results/bookingEmpty.html', $response->getBody()->__toString());
    }

    /**
     * Get request to test controller
     *
     * @return ServerRequestInterface
     */
    private function getReqesut(): ServerRequestInterface 
    {
        return new ServerRequest();
    }
}