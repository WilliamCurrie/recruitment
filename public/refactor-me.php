<?php

require_once('../src/DBConnection.php');

spl_autoload_register(function ($class_name) {
    include_once('../src/' . $class_name . '.php');
});

$db = new DBConnection();
$user_details = array();
$all_customers = array();
$all_bookings = array();

$customer = new Customer($db);
$customer->first_name = "Jim";
$customer->second_name = "Johnson";
$customer->saveCustomer();

$booking = new Booking($db);
$booking->saveBooking($customer->id);

$user_details = Customer::getCustomer($customer->id, $db);
$all_customers = Customer::getAllCustomers($db);
$all_bookings = Booking::getAllBookings($db);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple App</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1>Simple Database App</h1>

<?php

    echo 'User';
    echo '<table>';
    echo '<tr>';
    echo '<td>Customer ID</td>';
    echo '<td>First Name</td>';
    echo '<td>Second Name</td>';
    echo '<td>Address</td>';
    echo '</tr>';
    foreach ($user_details as $id => $user) {
        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $user['first_name'] . '</td>';
        echo '<td>' . $user['second_name'] . '</td>';
        echo '<td>' . $user['address'] . '</td>';
        echo '</tr>';
    }
    unset($user);
    echo '</table>';
    echo '<br />';
    
    echo 'All Customers';
    echo '<table>';
    echo '<tr>';
    echo '<td>Customer ID</td>';
    echo '<td>First Name</td>';
    echo '<td>Second Name</td>';
    echo '<td>Address</td>';
    echo '</tr>';
    foreach ($all_customers as $id => $customer) {
        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $customer['first_name'] . '</td>';
        echo '<td>' . $customer['second_name'] . '</td>';
        echo '<td>' . $customer['address'] . '</td>';
        echo '</tr>';
    }
    unset($customer);
    echo '</table>';
    echo '<br />';
      
    echo 'All Bookings';
    echo '<table>';
    echo '<tr>';
    echo '<td>Booking ID</td>';
    echo '<td>First Name</td>';
    echo '<td>Second Name</td>';
    echo '<td>Address</td>';
    echo '<td>Booking Reference</td>';
    echo '<td>Booking Date</td>';
    echo '</tr>';
    foreach ($all_bookings as $id => $booking) {
        echo '<tr>';
        echo '<td>' . $id . '</td>';
        echo '<td>' . $booking['first_name'] . '</td>';
        echo '<td>' . $booking['second_name'] . '</td>';
        echo '<td>' . $booking['address'] . '</td>';
        echo '<td>' . $booking['booking_reference'] . '</td>';
        echo '<td>' . $booking['booking_date'] . '</td>';
        echo '</tr>';
    }
    unset($booking);
    echo '</table>';
    echo '<br />';
    
?>

</body>
</html>

