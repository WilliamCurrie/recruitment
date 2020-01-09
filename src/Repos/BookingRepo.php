<?php

namespace Src\Repos;

use Carbon\Carbon;
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

    /**
     * Save a booking into the database
     *
     * @param Booking $booking the instantiated Booking class you want to save
     * @return Booking|bool
     */
    public function save(Booking $booking)
    {
        if (!isset($booking->customer_id)) {
            return 'customer_id not present';
        } else {
            if (!$this->customerRepo->find($booking->customer_id)) {
                return 'Customer not found';
            }
        }

        $booking->booking_date = $booking->booking_date ?? Carbon::now();

        $query = $this->db->prepare('INSERT INTO bookings (customer_id, booking_reference, booking_date) VALUES (?, ?, ?)');
        $query->bind_param(
            'iss',
            $booking->customer_id,
            $booking->booking_reference,
            $booking->booking_date
        );
        $result = $query->execute();
        $query->close();
        return $result ? $this->db->insert_id : $result;
    }

    /**
     * Delete a booking from the database
     *
     * @param int $id the id of the booking to delete
     * @return bool
     */
    public function delete(int $id)
    {
        $query = $this->db->prepare('DELETE FROM bookings WHERE bookings.id = ?');
        $query->bind_param(
            'i',
            $id
        );
        $result = $query->execute();
        $query->close();
        return $result;
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
