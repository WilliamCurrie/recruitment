<?php
class Booking
{
    private $db;

    public function __construct(&$db)
    {
        $this->db = $db;
    }

    public function getBookings($id = false)
    {
        $params = array();
        $sql = "SELECT * FROM bookings";

        if ($id) {
            $sql .= " WHERE customerID = :id";
            $params = ['id' => $id];
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $ret = array();
        $User = new Customer($this->db);

        while ($row = $stmt->fetch()) {
            $User->findById($row['customerID']);
            $key = $row['id'];
            $ret[$key] = array(
                'customerName' => design::formatNames($User->getFirstName(), $User->getLastName()),
                'bookingReference' => $row['booking_reference'],
                'bookingDate' => date('D dS M Y', $row['booking_date'])
            );
        }

        return $ret;
    }
}