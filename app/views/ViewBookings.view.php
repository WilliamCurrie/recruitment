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
    if(count($results) > 0) {
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
    }
    ?>
  </tbody>
</table>
