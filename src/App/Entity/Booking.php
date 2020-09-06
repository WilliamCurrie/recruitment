<?php

namespace App\Entity;

use App\Entity\Customer;

class Booking
{
    /** @var int */
    public $id;

    /** @var string */
    public $bookingReference;

    /** @var \DateTime */
    public $bookingDate;

    /** @var Customer */
    public $customer;
}
