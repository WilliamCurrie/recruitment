<?php

namespace App\Repository;

use App\Entity\Booking;
use App\Repository\CustomerRepository;

class BookingRepository
{
    public function __construct()
    {
        // @todo use a DB layer/ORM etc
        $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if (!$this->db) {
            throw new \RuntimeException("Couldn't connect to DB");
        }

        $this->customerRepository = new CustomerRepository();
    }

    /**
     * @returns array of Booking entities
     * @throws \RuntimeException on DB error
     */
    public function getBookingsForCustomerId(int $customerId): array
    {
        $customer = $this->customerRepository->findById($customerId);

        $res = $this->db->query("
            SELECT * FROM bookings
            WHERE customerID = '{$customerId}'
        ");
        if (!$res) {
            throw new \RuntimeException("Couldn't fetch bookings from DB");
        }
        $bookings = [];
        while ($row = $res->fetch_assoc()){
            $booking = new Booking();
            $booking->id = $row['id'];
            $booking->bookingReference = $row['booking_reference'];
            $booking->bookingDate = new \DateTime($row['booking_date']);

            $bookings[$row['id']] = $booking;
        }

        return $bookings;
    }

    public function __destruct()
    {
        mysqli_close($this->db);
    }
}
