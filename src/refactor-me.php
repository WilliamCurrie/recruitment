<?php







class Booking {

    public function GetBookings($id = false)
    {
        $sql = "SELCT * FROM bookings";
        if ($id !== false ) {
            $sql .= " WHERE customerID=" . $id;
        }


        $db = new \mysqli('127.0.0.1', 'testuser', 'password', 'test', DB_PORT);
        $res = $db->query($sql);

        while ($result = $res->fetch_assoc()){
         $User = User::findById($result['customerID']);
            $return[$result['id']]['customer_name'] = $User->first_name . ' ' . $User->last_name;
            $return[$result['id']]['booking_reference'] = $result['booking_reference'];
            $return[$result['id']]['booking_date'] = date('D dS M Y', result['booking_date']);
        }

        return $return;
    }

}




?>




<?php ?>
