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
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-sm-offset-4">
        <div class="inner-wrapper">
          <h1>Simple Database App</h1>
          <?php
          if(isset($_GET['customer_id']) && $_GET['customer_id'] > 0) {
            include(dirname($_SERVER["DOCUMENT_ROOT"]) . '/app/views/ViewBookings.view.php');
          } else if(isset($_GET['add_customer'])) {
            include(dirname($_SERVER["DOCUMENT_ROOT"]) . '/app/views/AddCustomer.view.php');
          } else {
            include(dirname($_SERVER["DOCUMENT_ROOT"]) . '/app/views/ViewCustomers.view.php');
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo JS_PATH; ?>/wranx.js"></script>
</body>
</html>
