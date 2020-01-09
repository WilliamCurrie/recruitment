<?php

namespace Src\Repos;

use Src\config\Database;
use Src\Models\Booking;
use Src\Repos\CustomerRepo;

class BookingRepo
{
    private $db;
    private $customerRepo;

    public function __construct()
    {
        $this->db = (new Database())->db;

        $this->customerRepo = new CustomerRepo();
    }

    
    public function getBookings($id = false)
    {
        $sql = "SELECT * FROM bookings";
        if ($id) {
            $sql .= " WHERE customer_id = $id";
        }

        $results = $this->db->query($sql);
        $bookings = [];
        if ($results) {
            foreach ($results as $res) {
                $booking = new Booking($res);
                $booking->customer = $this->customerRepo->find($booking->customer_id);
                $bookings[] = $booking;
            }
        }

        return $bookings;
    }
}
