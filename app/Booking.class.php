<?php
require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';
class Booking extends Base {

  public function getBookings($id = false)
  {
    $sql = "SELECT * FROM bookings";
    if ($id !== false ) {
      $sql .= " WHERE customer_id=" . $id;
    }

    $res = $this->_db->query($sql);

    while ($result = $res->fetch_assoc()){
      $customer = new Customer();
      $user = $customer->findById($result['customer_id']);
      $return[$result['id']]['customer_name'] = $user->first_name . ' ' . $user->last_name;
      $return[$result['id']]['booking_reference'] = $result['booking_reference'];
      $return[$result['id']]['booking_date'] = date('D dS M Y', $result['booking_date']);
    }

    return $return;
  }

}

?>
