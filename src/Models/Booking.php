<?php

namespace Src\Models;

use Src\config\Database;
use Carbon\Carbon;

class Booking
{
    public $id;
    public $customer_id;
    public $booking_reference;
    public $booking_date;
    public $customer;

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            if (isset($key)) {
                $this->$key = $value;
            }
        }
    }
}