<?php
    class Booking extends Customer
    {

        public function __construct() 
        {
    
            $db = Database::getInstance();
            $this->_dbh = $db->getConnection();


        }

        public function GetBookings($id = false)
        {
            $id = (int)$id;
            $query = "SELECT id, booking_reference, DATE_FORMAT(booking_date, '%W %D of %M %y') as booking_date FROM bookings";
            
            if ( $id )
                $query .= " WHERE customerID=" . $id;

            $result = $this->_dbh->query($query);
            while ( $row = $result->fetch_assoc() )
            {
                $user = $this->findById($id);
                $return[$row['id']]['customer_name']     = $user['first_name'] . ' ' . $user['second_name'];
                $return[$row['id']]['booking_reference'] = $row['booking_reference'];
                $return[$row['id']]['booking_date']      = $row['booking_date'];
            }

            return $return;
        }

    }