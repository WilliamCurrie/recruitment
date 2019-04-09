<?php
require_once 'db/database.class.php';

class Booking {

    // Get bookings from the database either by ID, or get all with null ID
    public function get_bookings($id = null) {

        $sql = 'SELECT id, customerID, booking_reference, booking_date FROM bookings';
        if($id !== null) {
            $sql .= ' WHERE customerID = ?';
        }

        $database = new Database();
        $db = $database->connect();
        $res = $db->prepare($sql);
        $res->bind_param('i', $id);
        $res->execute();
        $result = $res->get_result();

        $return = [];
        while($row = $result->fetch_assoc()) {
            // Could feasibly use a JOIN with customerID on id in customers table
            // to get name but we need to reference $customer for format_name function
            $customer = new Customer();
            $person = $customer->find_by_id($row['customerID']);

            $return[$row['id']]['customer_name'] = $customer->format_name($person['first_name'], $person['second_name']);
            $return[$row['id']]['booking_reference'] = $row['booking_reference'];
            $return[$row['id']]['booking_date'] = date('D dS M Y', strtotime($row['booking_date']));
        }

        $res->close();

        return $return;

    }

}
