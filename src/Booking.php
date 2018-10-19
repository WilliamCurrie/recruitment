<?php

class Booking
{
    public $id;
    public $booking_reference;
    public $booking_date;
    private $db;

    public function __construct($db)
    {
        $this->id = null;
        $this->booking_reference = $this->generateBookingRef();
        $this->booking_date = null;
        $this->db = $db;
    }
    
    protected function generateBookingRef()
    {
        $codes = array('JE', 'LT');
        $randIndex = array_rand($codes);
        $two_letter_code = $codes[$randIndex];
        $three_digits = substr(str_shuffle("0123456789"), 0, 3);
        return $two_letter_code . $three_digits;
    }

    public function saveBooking(int $customerID)
    {
        if (($customerID > 0) && ($this->booking_reference !== null)) {
            $stmt = $this->db->dbc->prepare("INSERT INTO bookings (customerID, booking_reference, booking_date) VALUES (?, ?, now())");
            $stmt->execute(array($customerID, $this->booking_reference));
            $this->id = $this->db->dbc->lastInsertId();
        }
        return $this;
    }
    
    public function getAllBookings($db)
    {
        // get all bookings for a specific customerID
        $sqlSelect = "SELECT customers.id as customerID, bookings.id as bookingID, customers.first_name, customers.second_name, customers.address, bookings.booking_reference, bookings.booking_date FROM customers INNER JOIN bookings ON customers.id = bookings.customerID";
        $rows = $db->getQuery($sqlSelect);
        $bookings = array();
        foreach($rows as $row) {
            $bookings[$row['bookingID']]['first_name'] = $row['first_name'];
            $bookings[$row['bookingID']]['second_name'] = $row['second_name'];
            $bookings[$row['bookingID']]['address'] = $row['address'];
            $bookings[$row['bookingID']]['booking_reference'] = $row['booking_reference'];
            $bookings[$row['bookingID']]['booking_date'] = date('D jS M Y', $row['booking_date']);
        }
        return (array)$bookings;
    }
    
}

?>