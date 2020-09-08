<?php

namespace WrRecruitment\Controller;

use WrRecruitment\Model\Booking;
use WrRecruitment\Model\Customer;

class BookingController
{
    public function index($params)
    {
        $bookings = (new Booking())->getBookings($params['id']);
        $customer = (new Customer())->findById($params['id']);
        $vars = compact('bookings', 'customer');
        view('bookings', $vars);
    }
}
