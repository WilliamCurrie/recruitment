<?php
// Include references for system classes
require_once 'templates/classes.php';
// Start the HTML document
require_once 'templates/header.php';

// Separate views are better but calling functions and echo'ing results OK for 2-4h
?>

<h1>Simple Database App</h1>

<h2>Save and retrieve customer</h2>

<?php

// Create a and display a customer
$customer = new Customer();
// This would usually be form input send via $_POST[...] rather than hard-coded values
$customer->first_name = 'Jim';
$customer->second_name = 'Johnson';
$customer->address = '45 A. Place, Liverpool, UK, L1 8FF';

echo $customer->save_customer($customer->first_name, $customer->second_name, $customer->address);
echo '<br>';

echo $customer->get_all_customers_by_second_name();

echo '<br>';

// Fetch and display all customers in the system

echo '<h2>All customers</h2>';

$customer = new Customer();
echo $customer->get_all_customers();

// Display all bookings in the system

echo '<h2>All bookings</h2>';

$bookings = new Booking();
$results = $bookings->get_bookings($_GET['customer_id']);

foreach($results as $result) {
    echo $result['booking_reference'] . ' - '. $result['customer_name'] . ' (' . $result['booking_date'] . ') <br>';
}

// End the HTML document
require_once 'templates/footer.php';
