<?php

class Booking {

    private $db;

    /**
     * User model constructor - connects to the database.
     */
    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Gets all bookings from database.
     * @param $email - string
     * @return bool
     */
    public function getBookings() {
        $this->db->query("SELECT b.id AS b_id, 
            booking_reference AS b_ref, 
            booking_date AS b_date, 
            c.first_name AS f_name, 
            c.last_name AS s_name, 
            c.address AS address, 
            c.twitter_alias as twitter
            FROM bookings AS b
            LEFT JOIN customers AS c 
            ON b.customerID = c.id
                          ");

        return $this->db->getMultipleObjects();
    }


}
