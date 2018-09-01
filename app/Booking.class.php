<?php
require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';
class Booking extends Base {

  public function getBookings($id = false)
  {
    $sql = "SELECT * FROM bookings";
    if ($id !== false ) {
      $sql .= " WHERE customer_id = " . $id;
    }
    $res = $this->_db->query($sql);
    $bookings = $this->formatBookings($res);
    return $bookings;
  }

  public function formatBookings($bookings) {
    $customer = new Customer();
    while ($booking = $bookings->fetch_assoc()){
      $user = $customer->findById($booking['customer_id']);
      $bks[$booking['id']]['customer_name'] = $user->first_name . ' ' . $user->second_name;
      $bks[$booking['id']]['booking_reference'] = $booking['booking_reference'];
      $bks[$booking['id']]['booking_date'] = date('D dS M Y', $booking['booking_date']);
    }
    return $bks;
  }

}

?>
