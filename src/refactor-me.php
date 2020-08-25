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
$customer = new Customer();
$customer->firstName = "Jim";
$customer->last_name = "Johnson";
echo($customer->firstName);
echo($customer->last_name);
$customer->saveCustomer();
$customer->get_our_customers_by_surname();

$customer->getAllCustomers();
$bookings = new Booking();
    $results = @$bookings->GetBookings($_GET['customerId']);
    foreach ($results as $result):
        echo $result['booking_reference'] . ' - '. $result['customer_name'] . $result['booking_date'];
    endforeach;

?>

</body>
</html>

<?php ?>
