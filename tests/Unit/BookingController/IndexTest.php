<?php

namespace Unit\BookingController;

use App\Controllers\BookingController;
use App\Models\Booking;
use App\Models\Customer;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase {

    /**
     * @var BookingController
     */
    protected $controller;

    /**
     * @var Booking;
     */
    protected $booking_model;

    /**
     * @setUp
     */
    protected function setUp() {
        parent::setUp();

        $this->controller    = new BookingController();
        $this->booking_model = new Booking();
    }

    /**
     * @see BookingController::index()
     * @test
     */
    public function testWithoutId() {

        $expected = $this->booking_model->select()->get();

        $result = $this->controller->index();

        foreach ($result as $k => $value) {

            $expected_record = $expected[$k];
            $this->assertRecordSet($expected_record, $value);
        }
    }

    /**
     * @see BookingController::index()
     * @test
     */
    public function testWithId() {

        $customer_model = new Customer();
        $customer       = $customer_model->select()->first();

        $expected = $this->booking_model->select()->where('customerID', '=', $customer['id'])->get();

        $result = $this->controller->index($customer['id']);

        foreach($result as $k => $value){
            $expected_record = $expected[$k];
            $this->assertRecordSet($expected_record, $value);
        }

    }

    /**
     * @param $expected
     * @param $actual
     */
    private function assertRecordSet($expected, $actual) {

        $this->assertArrayHasKey('id', $actual);
        $this->assertArrayHasKey('customerID', $actual);
        $this->assertArrayHasKey('booking_reference', $actual);
        $this->assertArrayHasKey('booking_date', $actual);

        $this->assertSame($expected['id'], $actual['id']);
        $this->assertSame($expected['customerID'], $actual['customerID']);
        $this->assertSame($expected['booking_reference'], $actual['booking_reference']);
        $this->assertSame($expected['booking_date'], $actual['booking_date']);
    }
}