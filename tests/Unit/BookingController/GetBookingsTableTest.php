<?php

namespace Unit\BookingController;

use App\Controllers\BookingController;
use App\Models\Booking;
use App\Models\Customer;
use PHPUnit\Framework\TestCase;

class GetBookingsTableTest extends TestCase {

    /**
     * @var Customer
     */
    protected $customer_model;

    /**
     * @var BookingController
     */
    protected $controller;

    /**
     * @var Booking
     */
    protected $model;

    /**
     * @setUp
     */
    protected function setUp() {
        parent::setUp();

        $this->controller     = new BookingController();
        $this->customer_model = new Customer();
        $this->model          = new Booking();
    }

    /**
     * @see BookingController::getBookingsTable()
     * @test
     */
    public function testWithoutId() {

        $result = $this->controller->getBookingsTable();

        foreach ($result as $item) {
            $this->assertArrayHasKey('id', $item);
            $this->assertArrayHasKey('customerID', $item);
            $this->assertArrayHasKey('booking_reference', $item);
            $this->assertArrayHasKey('booking_date', $item);
            $this->assertArrayHasKey('customer_name', $item);
        }
    }

    /**
     * @see BookingController::getBookingsTable()
     * @test
     */
    public function testWithId() {

        $customer = $this->customer_model->select()->first();

        $result = $this->controller->getBookingsTable($customer['id']);

        foreach ($result as $item) {
            $this->assertArrayHasKey('id', $item);
            $this->assertArrayHasKey('customerID', $item);
            $this->assertArrayHasKey('booking_reference', $item);
            $this->assertArrayHasKey('booking_date', $item);
            $this->assertArrayHasKey('customer_name', $item);
        }
    }
}