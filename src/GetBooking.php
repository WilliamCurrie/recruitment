<?php 
include_once 'DbConn.php';
include_once 'Booking.php';


print_r($_POST);
$bookings = new Booking($dbc);
	if(isset($_POST['ID'])){
	
    $results = $bookings->GetBookings($_POST['ID']);

    foreach ($results as $res):
       echo "<p />"  . $res['booking_reference'] . ' - '. $res['customer_name'] . $res['booking_date'];
    endforeach;
}
?>