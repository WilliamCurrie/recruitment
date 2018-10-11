<?php
namespace App\Controllers;

use App\Models\Booking;
use App\Models\Customer;

class CustomerController{

    /**
     *
     */
    public function view()
    {
        $bookings = Booking::with('customer')->get();
        return view('index', [
            'bookings'  => $bookings,
            'customers' => Customer::all()
        ]);
    }

}