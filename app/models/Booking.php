<?php


namespace App\Models;

class Booking extends Model
{
    private $tableName = "bookings";

    /**
     * Format booking_date
     * @param array $elements
     * @return array
     */
    private function convertDate(array $elements) :array
    {
        $result = [];
        foreach ($elements as $element) {
            $date = \DateTime::createFromFormat('Y-n-j G:i:s', $element['booking_date']);
            $element['booking_date'] = $date->format('D dS M Y');
            array_push($result, $element);
        }
        return $result;
    }

    /**
     * Get all Bookings
     * @return array
     */
    public function getBookings() :array
    {
        $result = $this->db->getAll($this->tableName);
        return  $this->convertDate($result);
    }

    /**
     * Get Bookings by ID
     * @param string $id
     * @return array
     */
    public function getBookingById(string $id) :array
    {
        $result = $this->db->get($this->tableName, "customerID", $id);

        return $this->convertDate($result);
    }

    /**
     * @todo Need to implement
     * @param int $customerID
     * @param string $bookingRef
     * @return bool
     */
    public function createBooking(int $customerID, string $bookingRef) :bool
    {
        return false;
    }
}
