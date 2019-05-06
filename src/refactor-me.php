<?php
declare(strict_types=1);
namespace Wranx;

// Bootstrap
use ArgumentCountError;
use Exception;

require  __DIR__ . '/../config/setup.php';

session_start();
if (isset($_SESSION['saved'])){
    unset($_SESSION['saved']);
}
$_SESSION['saved'] = 0;

$customer = new Customer();
$customer->setFirstName('Jim');
$customer->setLastName('Jonson');
$first = $customer->getFirstName();
$last = $customer->getLastName();

if ($_SESSION['saved'] === 0){
    try {
        $return = $customer->insert($first, $last);
        $_SESSION['saved'] = 1;
    } catch (ArgumentCountError $e){
        echo "<p>Error inserting into the database." . $e->getMessage() . "</p>";
    }
}

// We would use a templating engine in world world.
// We are working with small data sets here, so fetching all at once.
// Streaming examples can be seen in classes and unit tested.

if ($_SESSION['saved'] === 1){
    $header = <<<EOF
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Simple  App</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
    </head>

    <body>
    <h1>Simple Database App</h1>
EOF;

    $footer = '</body></html>';

    $body = "<h3>Inserted: ";
    $body .= htmlspecialchars($first, ENT_QUOTES) . ' ' . htmlspecialchars($last, ENT_QUOTES);
    $body .= "</h3>";

    try {
        $tmp = $customer->getAllBySurname();

        $body .= "<table style=\"width:100%\">";
        $body .= "<caption>Customers by last name</caption><thead><th>Full Name</th></thead><tbody>";
        $body .= "<tbody>";
        foreach ($tmp as $k => $v){
            $body .= "<tr>";
            $body .= "<td>" . htmlspecialchars($v, ENT_QUOTES) . "</td>";
            $body .= "</tr>";
        }
        unset($tmp);

        $body .= "</tbody>";
        $body .= "</table>";
    } catch (Exception $e){
        // log exception
    }

    $b = new Booking();
    $tmp = $b->getAll();

    $body .= "<table style=\"width:100%\">";
    $body .= "<caption>Bookings</caption><thead><th>Reference</th><th>Customer</th><th>Date</th></thead><tbody>";
    $body .= "<tbody>";
    foreach ($tmp as $k => $v){
        $body .= "<tr>";
        $body .= "<td>" . htmlspecialchars($v['booking_reference']) . "</td>";
        $body .= "<td>" . htmlspecialchars($v['customer_name']) . "</td>";
        $body .= "<td>" . htmlspecialchars($v['booking_date']) . "</td>";
        $body .= "</tr>";
    }
    unset($tmp);

    $body .= "</tbody>";
    $body .= "</table>";

    echo $header . $body . $footer;
}