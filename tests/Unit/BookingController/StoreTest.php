<?php

namespace Unit\BookingController;

use App\Controllers\BookingController;
use App\Models\Booking;
use App\Models\Customer;
use Carbon\Carbon;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class StoreTest extends TestCase {

    /**
     * @var BookingController;
     */
    protected $controller;

    /**
     * @var Booking
     */
    protected $model;

    /**
     * @var Factory
     */
    protected $faker;


    /**
     * @setUp
     */
    protected function setUp() {
        parent::setUp();

        $this->controller = new BookingController();
        $this->model      = new Booking();
        $this->faker      = Factory::create('en_GB');
    }

    /**
     * @see BookingController::store()
     * @test
     */
    public function test() {

        $customer_model = new Customer();

        $booking_data = [
            'customerID'        => $customer_model->select()->first()['id'],
            'booking_reference' => $this->faker->ean8,
            'booking_date'      => Carbon::now()->toDateTimeString()
        ];

        $result = $this->controller->store($booking_data);

        $this->assertInstanceOf(Booking::class, $result);
    }
}

