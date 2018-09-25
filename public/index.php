<?php

use Dotenv\Dotenv;
use RecruitJordi\BookingRepository;
use RecruitJordi\Customer;
use RecruitJordi\CustomerRepository;
use RecruitJordi\Db;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__.'/../');
$dotenv->load();

$db = Db::getInstance();

if ($_POST) {
    $customer = new Customer($db);
    $customer->setFirstName($_POST['first_name']);
    $customer->setLastName($_POST['last_name']);
    $customer->setAddress($_POST['address']);
    $customer->setTwitterAlias($_POST['twitter_alias']);
    $customer->save();
}
?>

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

        <h2>Customers</h2>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Twitter Alias</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ((new CustomerRepository($db))->fetchAll() as $customer) { ?>
                    <tr>
                        <td><?php echo $customer['first_name']; ?></td>
                        <td><?php echo $customer['last_name']; ?></td>
                        <td><?php echo $customer['address']; ?></td>
                        <td><?php echo $customer['twitter_alias']; ?></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>

        <h2>Bookings</h2>
        <table>
            <thead>
                <tr>
                    <th>Booking Id</th>
                    <th>Reference</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ((new BookingRepository($db))->fetchAll() as $booking) { ?>
                    <tr>
                        <td><?php echo $booking['id']; ?></td>
                        <td><?php echo $booking['reference']; ?></td>
                        <td><?php echo $booking['date']; ?></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>

        <h2>Bookings by Customer</h2>
        <table>
            <thead>
                <tr>
                    <th>Booking Id</th>
                    <th>Reference</th>
                    <th>Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Twitter Alias</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ((new BookingRepository($db))->fetchByCustomerId(1) as $booking) { ?>
                    <tr>
                        <td><?php echo $booking['booking_id']; ?></td>
                        <td><?php echo $booking['booking_reference']; ?></td>
                        <td><?php echo $booking['booking_date']; ?></td>
                        <td><?php echo $booking['customer_first_name']; ?></td>
                        <td><?php echo $booking['customer_last_name']; ?></td>
                        <td><?php echo $booking['customer_address']; ?></td>
                        <td><?php echo $booking['customer_twitter_alias']; ?></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>

        <hr />

        <h2>New Customer</h2>
        <form method="post">
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div>
                <label for="twitter_alias">Twitter Alias:</label>
                <input type="text" id="twitter_alias" name="twitter_alias">
            </div>
            <div>
                <button type="submit">Accept</button>
            </div>
        </form>
    </body>
</html>
