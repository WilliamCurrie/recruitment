<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/showoff.js"></script>
</head>

<body>
<h1>Simple Database App</h1>
<!-- data entry form -->
<?php
if ($_SESSION['msg']) {
    printf("<p><strong>%s</strong></p>",$_SESSION['msg']);
 unset($_SESSION['msg']);
}
?>
<form id="addcustomer" action="" method="POST">
    <h2>Add New Customer</h2>
    <input type="hidden" name="action" value="SaveCustomer">
    <input type="text" name="first_name" value="" required placeholder="Firstname">
    <input type="text" name="last_name" value="" required placeholder="Surname">
    <textarea name="address" required placeholder="Address"></textarea>
    <button type="submit">Add Customer</button>
    
</form>
<ul class="customers">
<?php    
    foreach ($this->customers as $r):
    printf("<li><h3>%s <strong>%s</strong></h3><button data-userid='%d'>View Bookings</button></li>",$r->first_name,$r->second_name,$r->id);
    endforeach;
    
?>
</ul>




</body>
</html>
