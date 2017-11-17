<?php

namespace App\Models;

class Bookings extends BaseModel
{
    protected $table = 'bookings';

    public function byCustomer($id = null)
    {
        if (is_int($id)) {
            $this->query .= "where customerID = :$id";
            $this->data[':customerID'] = $id;
        }
    }

    public function withCustomers()
    {
        $this->query .= ' LEFT JOIN customers on bookings.customerID = customers.id';
    }
}
