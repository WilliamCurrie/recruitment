<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Simple Database App</h1>
<h2> </h2>

<?php

include_once 'customers.php';
include_once 'Booking.php';

include_once 'DbConn.php';
$customer = new Customer($dbc);

$customer->first_Name = "Jim";
$customer->second_name = "Johnson";
echo($customer->first_Name);
echo($customer->second_name);	
$customer->saveCustomer();





$customer->get_our_customers_by_surname();


$customer->getAllCustomers();

mysqli_close($dbc);
?>

<form action="GetBooking.php" method="post">

	ID Please <input type="text" name="ID" value="" /> <br />
		<input type="submit" name="submit" value="Submit" />
	</form>





</body>
</html>

