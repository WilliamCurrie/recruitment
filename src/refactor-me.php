<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotEnv->load();

$bookingController = new \App\Controllers\Booking();
$customerController = new \App\Controllers\Customer();
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

<!--bookings list-->
<h3><u>Booking List</u></h3>
<table width="600" cellspacing="0" cellpadding="5" border="1">
    <tr class="table__heading">
        <td>Booking Reference</td>
        <td>Customer</td>
        <td>Booking Date</td>
    </tr>
    <?php foreach ($bookingController->getBookings() as $item) : ?>
        <tr>
            <td><?= $item['booking_reference'] ?></td>
            <td><?= $item['first_name'] ?></td>
            <td><?= $item['booking_date'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h3><u>Get Customers (get by second name = "lewis")</u></h3>
<table width="600" cellspacing="0" cellpadding="5" border="1">
    <tr class="table__heading">
        <td>First name</td>
        <td>Second name</td>
    </tr>
    <?php foreach ($customerController->getCustomers(['second_name' => 'lewis']) as $item) : ?>
        <tr>
            <td><?= $item['first_name'] ?></td>
            <td><?= $item['second_name'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>


</body>
</html>