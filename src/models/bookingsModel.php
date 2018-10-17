<?php
class bookings extends parentModel{

  public function getBookings($id = false)
  {
    if(!empty($id)){

      $query = $this->db->prepare("SELECT `customerID`, `booking_reference`, `booking_date` FROM `bookings` WHERE `customerID` = ?");
      $query->bind_param('i', $id);
    	$query->execute();
    	$query->bind_result($customerId, $bookingRef, $bookingDate);
    	$query->store_result();
      $rows = array();
      $i = 0;

    	while($query->fetch()){
        $c = new customers();
        $customerInfo = $c->getCustomerById($customerId);
        //Set return array
        $rows[$i]['customerName'] = $this->helper->formatNames($firstName, $lastName);
        $rows[$i]['bookingRef'] = $bookingRef;
        $rows[$i]['bookingDate'] = date('D dS M Y', strtotime($bookingDate));
        $i++;
      }
  		if($query->affected_rows == 0){
        //Show no data returned
        return -1;
      }
      return $rows;
    	$query->free_result();
    }else{
      //id empty show message or do nothing..
      return -2;
    }
  }
}
