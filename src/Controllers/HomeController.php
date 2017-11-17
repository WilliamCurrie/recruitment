<?php

namespace App\Controllers;

use App\Models\Bookings;
use App\Models\Customer;

class HomeController
{
    public function index()
    {
        $customerData = ['first_name' => 'Jim', 'second_name' => 'Johnson'];
        $saveCustomer = new Customer();
        $saveCustomer->save($customerData);

        $customer = new Customer();
        $customer->where('first_name', '=', 'Jim');
        $customer->orderBy('ASC', 'first_name');
        $customer = $customer->get();

        $customersBySurname = new Customer();
        $customersBySurname->orderBy('DESC', 'second_name');
        $customersBySurname = $customersBySurname->get();

        $allCustomers = new Customer();
        $allCustomers = $allCustomers->get();

        $customerID = null;
        if (!empty($_GET['customerId'])) {
            $customerID = $_GET['customerId'];
        }

        $bookings = new Bookings();
        $bookings->byCustomer($customerID);
        $bookings->withCustomers();
        $bookings = $bookings->get();

        include __DIR__.'/../Template/Layouts/default.php';
    }
}
