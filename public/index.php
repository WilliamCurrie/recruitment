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
          if(isset($_GET['customer_id'])):
            ?>
            <a href="/" class="btn btn-md btn-success">View Customers</a>
            <table class="table table-responsive table-striped">
              <thead>
                <tr>
                  <th>
                    Booking Reference
                  </th>
                  <th>
                    Customer Name
                  </th>
                  <th>
                    Booking Date
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $bookings = new Booking();
                $results = $bookings->getBookings($_GET['customer_id']);
                foreach ($results as $result):
                  ?>
                  <tr>
                    <th>
                      <?php echo $result['booking_reference']; ?>
                    </th>
                    <th>
                      <?php echo $result['customer_name']; ?>
                    </th>
                    <th>
                      <?php echo $result['booking_date']; ?>
                    </th>
                  </tr>
                  <?php
                endforeach;
                ?>
              </tbody>
            </table>
            <?php
            elseif(isset($_GET['add_customer'])):
              ?>
              <a href="/" class="btn btn-md btn-success">View Customers</a>
              <h2 class="text-center">Add Customer</h2>
              <form id="add_customer" role="form">
                <input type="hidden" id="unique_id" name="unique_id" value="<?php echo $_SESSION['unique_id']; ?>">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
                </div>
                <div class="form-group">
                  <label for="second_name">Second Name</label>
                  <input type="text" class="form-control" id="second_name" name="second_name" placeholder="Enter last name">
                </div>
                <a id="add_customer_submit" type="button" class="btn btn-default">Submit</a>
              </form>
              <?php
            else:
              $customer = new Customer();
              $customers = $customer->getAllCustomersFormatted();
              ?>
              <a href="/?add_customer" class="btn btn-md btn-success">Add Customer</a>
              <table class="table table-responsive table-striped">
                <thead>
                  <th>
                    Customer Name
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                  <?php foreach($customers as $cust) :
                    ?>
                    <tr>
                      <td>
                        <?php echo $cust['name']; ?>
                      </td>
                      <td>
                        <a href="/?customer_id=<?php echo $cust['id']; ?>" class="btn btn-md btn-info">View Bookings</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>/wranx.js"></script>
  </body>
  </html>
