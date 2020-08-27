<?php

namespace App\Models;

use App\Database;

class Booking extends Model
{
    public function getBookingsByCustomerId($customerId)
    {
        $query = "SELECT
                    booking_id, customer_id, booking_reference, booking_date
                    FROM bookings
                    WHERE customer_id = :customer_id
                    ORDER BY booking_date ASC";
        $this->db->query($query);
        $this->db->bind(':customer_id', $customerId);
        return $this->db->fetchAllData();
    }
}
