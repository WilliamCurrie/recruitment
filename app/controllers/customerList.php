<?php

namespace App\Controllers;

use App\Models\Booking;
use App\Models\Customer;

class CustomerList extends Controller
{
    protected $view = 'list/customer';

    public function setData()
    {
        $customerIds = (new Customer())->getCustomerIds(array('customerId'=>$this->route[1]));
        foreach ($customerIds as $customerId) {
            $data['customers'][$customerId] = (new Customer($customerId))->getCustomerData();
            $data['customers'][$customerId]['bookings'] = (new Booking())->getBookingsByCustomerId($customerId);
        }
        return $data;
    }
}
