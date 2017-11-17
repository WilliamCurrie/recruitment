<?php
/**
 * Simple Page Template.
 *
 * @author Mark Jones <mark@kitkode.co.uk>
 */
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1>Simple Database App</h1>
<?php partial('surnameBlock.php', $customersBySurname); ?>
<?php partial('usersTable.php', $customersBySurname); ?>
<?php partial('bookinsBlock.php', $bookings); ?>
</body>
</html>
