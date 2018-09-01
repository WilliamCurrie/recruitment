<?php
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
