<?php

namespace Bff\Controllers;

use Bff\Helpers\TemplateHelper as View;
use Bff\Models\Booking;
use Bff\Models\Customer;
use Exception;

class Controller
{

    public function index()
    {
        $customer_id = isset($_GET['customerId']) ? $_GET['customerId'] : null;
        if (isset($_GET['customerId']) && filter_var(customer_id, FILTER_VALIDATE_INT)) {
            $customer_id = $_GET['customerId'];
        } else {
            $customer_id = null;
        }

        // Create a new customer
        $customer = new Customer();
        $customer->first_name = "Jim";
        $customer->last_name = "Johnson";
        $customer->saveCustomer();

        // $customer->get_our_customers_by_surname(); -not required pr 31/08/202

        $view = new View("main.template");
        $view->customer_table = $customer->getAllCustomers();

        $bookings = new Booking();
        $view->bookings_table = "";
        try {
            $results = $bookings->getBookings($customer_id);

            foreach ($results as $result):
                $view->bookings_table .= "<div>" . $result['booking_reference'] . " - " . $result['customer_name'] .
                    " " . $result['booking_date'] . "</div>";
            endforeach;
        } catch (Exception $e) {
            $view->bookings_table = "<div>No Bookings found</div>";
        }

        $view->customer_id = isset($_GET['customerId']) ? $_GET['customerId'] : "All";

        $view->render();
    }


}
