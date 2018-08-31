<?php
class Booking extends Base {

  public function GetBookings($id = false)
  {
    $sql = "SELCT * FROM bookings";
    if ($id !== false ) {
      $sql .= " WHERE customerID=" . $id;
    }

    $res = $this->_db->query($sql);

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
