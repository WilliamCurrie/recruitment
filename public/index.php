<?php
session_start();

require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';
new Config();

if(!array_key_exists('unique_id', $_SESSION)) {
  $_SESSION['unique_id'] = base64_encode(time() . rand(0,9999999) . uniqid());
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Simple App</title>
  <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/wranx.css">
</head>
<body>

  <div class="inner-wrapper">
    <h1>Simple Database App</h1>



    <?php

    $customer = new Customer();
    $customer->getOurCustomersBySurname();

    $customer->getAllCustomers();
    $bookings = new Booking();

    if(isset($_GET['customer_id'])){
      $results = $bookings->getBookings($_GET['customer_id']);
      foreach ($results as $result):
        echo $result['booking_reference'] . ' - '. $result['customer_name'] . $result['booking_date'];
      endforeach;
    }

    ?>


    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
          <h2 class="text-center">Add Customer</h2>
          <form id="add_customer" role="form">
            <input type="hidden" id="unique_id" name="unique_id" value="<?php echo $_SESSION['unique_id']; ?>">
            <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
            </div>
            <button id="add_customer_submit" type="button" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo JS_PATH; ?>/wranx.js"></script>
</body>
</html>
