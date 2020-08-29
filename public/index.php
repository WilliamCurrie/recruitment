<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
</head>
<body>
<h1>Simple Database App</h1>
<?php

use Wranx\Application\BookingApp;

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';

try {
    $bookings   = $app->make(BookingApp::class);

    // Save a new User
    $customer = $bookings->saveCustomer(['first_name'   => 'Jim', 'second_name' => 'Johnson']);
    echo '<h1>New Customer ID: '.$customer->first().'</h1>';

    // Get All Customers by username
    echo '<h1>Get All Customers by username</h1>';
    $allCustomersByUsername   = $bookings->getCustomersByUsername();
    foreach ($allCustomersByUsername->toArray() as $value){
        echo $value['first_name'].' '.$value['second_name']."<br/>";
    }

    // Get All Customers
    echo '<h1>Get All Customers</h1>';
    $customerId = 1;
    if (array_key_exists('customerId', $_GET)) {
        $customerId = array_filter($_GET['customerId'], FILTER_SANITIZE_NUMBER_INT);
    }
    $allCustomers   = $bookings->getAllCustomers($customerId);
    echo '<table>';
    foreach ($allCustomers->toArray() as $value){
        echo '<tr>';
        echo '<td>'.$value['first_name'].'</td>';
        echo '<td>'.$value['second_name'].'</td>';
        echo '</tr>';
    }
    echo '</table>';


    // Get Booking by customer Id
    echo '<h1>Get Booking by customer Id</h1>';
    $results        = $bookings->getBookings($customerId);
    foreach ($results->toArray() as $result):
        echo $result['booking_reference'] . ' - '. $result['customer_name'] . $result['booking_date']. "<br \>";
    endforeach;


} catch (Exception $e) {
    echo $e->getMessage();
}
?>
</body>
</html>
