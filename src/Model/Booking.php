<?php

namespace Booking\Model;


class Booking extends AbstractModel
{
    protected $fields = [
        'id' => 'id',
        'customerId' => 'customer_id',
        'bookingReference' => 'booking_reference',
        'bookingDate' => 'booking_date',
    ];

    public function getCustomer()  {
        /**
         * TODO: set relation for booking and customer
         */
    }

    public function getBookingDate() {
        return date('d/m/Y', strtotime($this->bookingDate));
    }
}