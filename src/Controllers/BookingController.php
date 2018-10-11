<?php
namespace App\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Carbon\Carbon;

class BookingController{

    /**
     *
     */
    public function store()
    {
        $new_booking = Booking::create([
            'customerID'        => request('customer'),
            'booking_reference' => request('reference'),
            'booking_date'      => Carbon::now()->toDateTimeString()
        ]);

        return redirect('/');
    }

}