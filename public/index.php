<?php
require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';
new Config();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
    <link rel="stylesheet" href="<?php CSS_PATH; ?>/wranx.css">
  </head>
  <body>
    <h1>Simple Database App</h1>
    <?php

      $customer = new Customer();
      $customer->first_name = "Jim";
      $customer->last_name = "Johnson";
      echo($customer->first_name);
      echo($customer->last_name);
      $customer->saveCustomer();
      $customer->getOurCustomersBySurname();

      $customer->getAllCustomers();
      $bookings = new Booking();
      $results = $bookings->getBookings($_GET['customer_id']);
      foreach ($results as $result):
        echo $result['booking_reference'] . ' - '. $result['customer_name'] . $result['booking_date'];
      endforeach;
    ?>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>/wranx.js"></script>
  </body>
</html>
