<?php
require __DIR__ . '/../src/config/bootstrap.php';

use Src\Repos\CustomerRepo;
use Src\Repos\BookingRepo;

$customerRepo = new CustomerRepo();
$bookingRepo = new BookingRepo();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  </head>
  <body>
    <div class='container'>
        <h1>Simple Database App</h1>

        <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customerRepo->list() as $customer) { ?>
                    <tr>
                        <td><?= $customer->id ?></td>
                        <td><?= $customer->first_name ?></td>
                        <td><?= $customer->last_name ?></td>
                        <td><?= $customer->address ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <hr>

        <table class='table'>
            <thead>
                <tr>
                    <th>Booking Ref</th>
                    <th>Customer Name</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bookingRepo->getBookings() as $booking) { ?>
                    <tr>
                        <td><?= $booking->booking_reference ?></td>
                        <td><?= $booking->customer->formattedName() ?></td>
                        <td><?= $booking->booking_date ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>