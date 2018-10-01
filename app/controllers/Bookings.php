<?php

class Bookings extends Controller {

    private $model;

    public function __construct() {
        $this->model = $this->loadModel("Booking");
    }

    public function index() {
        $bookings = $this->model->getBookings();

        $data = [
            "bookings" => $bookings,
        ];

        $this->loadView("bookings/index", $data);
    }

}
