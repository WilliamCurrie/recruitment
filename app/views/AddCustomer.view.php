<a href="/" class="btn btn-md btn-success">View Customers</a>
<h2 class="text-center">Add Customer</h2>
<form id="add_customer" role="form">
  <input type="hidden" id="unique_id" name="unique_id" value="<?php echo $_SESSION['unique_id']; ?>">
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input maxlength="30" type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
  </div>
  <div class="form-group">
    <label for="second_name">Second Name</label>
    <input maxlength="30" type="text" class="form-control" id="second_name" name="second_name" placeholder="Enter last name">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea maxlength="255" class="form-control" id="address" name="address" placeholder="Enter address"></textarea>
  </div>
  <div class="form-group">
    <label for="twitter_alias">Twitter Alias</label>
    <input maxlength="255" type="text" class="form-control" id="twitter_alias" name="twitter_alias" placeholder="Twitter Alias">
  </div>
  <a id="add_customer_submit" type="button" class="btn btn-default">Submit</a>
</form>
