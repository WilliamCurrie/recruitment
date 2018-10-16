<?php
require('config.php');
require('database.php');
require('design.php');
require('customer.php');
require('booking.php');

$db = new database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
$customer = new Customer($db->getDatabase());
$bookings = new Booking($db->getDatabase());
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple App</title>
</head>

<body>
<h1>Simple Database App</h1>

<?php

$customer->setFirstName("Jim");
$customer->setLastName("Johnson");
echo($customer->getFirstName());
echo($customer->getLastName());
$customer->saveCustomer();
echo design::createTable($customer->getOurCustomersBySurname());
echo design::createTable($customer->getAllCustomers());
echo design::createBookingsTable($bookings->getBookings($_GET['customerId']));
?>

</body>
</html>