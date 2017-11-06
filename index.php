<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1>Simple Database App</h1>

<?php
$customer = Customer::instance('mr','Jim', 'Johnson');

echo($customer::getFirstName());
echo($customer::getLastName());

$customersByLastName = Customer::findAllByLastName();
$allCustomers = Customer::getAllCustomers();

$bookings = Booking::getAllBookings($_GET['customerId']);
foreach ($bookings as $booking):
    echo $booking['booking_reference'] . ' - '. $booking['customer_name'] . $booking['booking_date'];
endforeach;

?>

</body>
</html>

<?php ?>
