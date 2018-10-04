<?php

namespace App\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Faker\Factory;

class BookingController {

    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * @var Booking;
     */
    protected $model;

    /**
     * BookingController constructor.
     */
    public function __construct() {
        $this->faker = Factory::create('en_GB');
        $this->model = new Booking();
    }

    /**
     * @param int $id
     * @return array
     */
    public function index($id = 0): array {

        $query = $this->model->select();
        if ($id) {
            $query->where('id', '=', $id);
        }

        return $query->get();
    }

    /**
     * @param array $data
     * @return \App\Models\Booking
     */
    public function store(array $data) {

        $booking_id = $this->model->insert($data);
        return $this->model->find($booking_id);
    }

    /**
     * NOTE: This is for the refactor-me.php Booking class and this is how it should have been done
     * @param int $id
     * @return array
     */
    public function getBookingsTable($id = 0) {

        $customer_model = new Customer(); //Ideally this would have been a join to

        $bookings = $this->index($id);

        foreach ($bookings as &$booking) {

            $customer                 = $customer_model->find($booking['customerID']);
            $booking['customer_name'] = $customer->getFullName();
            $booking['booking_date']  = \Carbon\Carbon::parse($booking['booking_date'])->format('d-M-y');
        }

        return $bookings;
    }
}