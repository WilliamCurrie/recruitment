<?php

namespace Src\Models;

use Src\config\Database;
use Carbon\Carbon;

class Booking {
    private $db;
    private $customer;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->db;

        $this->customer = new Customer();
    }

    public function getBookings($id = false)
    {
        $sql = "SELECT * FROM bookings";
        if ($id) {
            $sql .= " WHERE customer_id = $id";
        }

        $res = $this->db->query($sql);
        $formatted_return = [];
        if ($res) {
            while ($result = $res->fetch_object()){
                $customer = $this->customer->findById($result->customer_id);
                $formatted_return[$result->id]['customer_name'] = Customer::formatName($customer->first_name, $customer->last_name);
                $formatted_return[$result->id]['booking_reference'] = $result->booking_reference;
                $formatted_return[$result->id]['booking_date'] = (new Carbon($result->booking_date))->toDateString();
            }
        }

        return $formatted_return;
    }
}