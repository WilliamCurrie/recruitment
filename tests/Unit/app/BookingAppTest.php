<?php

namespace Wranx\Tests\Unit\app;

use Mockery;
use Mockery\Mock;
use Wranx\Application\BookingApp;
use Wranx\Application\Services\BookingService;
use Wranx\Application\Services\CustomerService;
use Wranx\Contracts\Support\Collection;
use Wranx\Tests\TestCase;

class BookingAppTest extends TestCase
{
    /**
     * @var Mock|BookingService
     */
    protected $mockBookingService;

    /**
     * @var Mock|CustomerService
     */
    protected $mockCustomerService;

    /**
     * @var Mock|Collection
     */
    protected $mockCollection;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockBookingService  = Mockery::mock(BookingService::class);
        $this->mockCustomerService = Mockery::mock(CustomerService::class);
        $this->mockCollection      = Mockery::mock(Collection::class);
    }

    /**
     * Save new customer
     * @test
     */
    public function save_customer(): void
    {
        $data = [
            'first_name'  => 'randomName',
            'last_name'   => 'randomName',
        ];
        $this->mockCustomerService
            ->expects()
            ->create($data)
            ->andReturns($this->mockCollection);

        $app = new BookingApp($this->mockBookingService, $this->mockCustomerService);
        $response = $app->saveCustomer($data);

        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Get All Customers
     * @test
     */
    public function get_all_customers(): void
    {
        $this->mockCustomerService
            ->expects()
            ->findAll()
            ->andReturns($this->mockCollection);

        $app = new BookingApp($this->mockBookingService, $this->mockCustomerService);
        $response = $app->getAllCustomers();

        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Sort Customers bt username
     * @test
     */
    public function get_customers_by_username(): void
    {
        $this->mockCustomerService
            ->expects()
            ->orderBy('second_name')
            ->andReturns($this->mockCollection);

        $app = new BookingApp($this->mockBookingService, $this->mockCustomerService);
        $response = $app->getCustomersByUsername();

        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Get Bookings by customer id
     * @test
     */
    public function get_bookings(): void
    {
        $this->mockCustomerService
            ->expects()
            ->findBy('id', 1)
            ->andReturns($this->mockCollection);
        $this->mockCollection
             ->expects()
             ->mapToGroups(Mockery::on(static function ($value){
                 return true;
             }))
             ->andReturns($this->mockCollection);

        $this->mockCollection
            ->expects()
            ->first()
            ->andReturns($this->mockCollection);

        $this->mockBookingService
            ->expects()
            ->findBy('customerID', 1)
            ->andReturns($this->mockCollection);

        $app = new BookingApp($this->mockBookingService, $this->mockCustomerService);
        $response = $app->getBookings(1);

        $this->assertInstanceOf(Collection::class, $response);
    }
}