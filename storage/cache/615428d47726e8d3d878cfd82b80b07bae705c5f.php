<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple App</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1>Simple Database App</h1>

<table>
    <thead>
    <th>#Booking Reference</th>
    <th>Customer Name</th>
    <th>Booking Date</th>
    </thead>
    <tbody>
    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>#<?php echo e($booking->booking_reference); ?></td>
            <td><?php echo e($booking->customer->getFullName()); ?></td>
            <td><?php echo e($booking->booking_date); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<hr />

<h2>Create new Order</h2>
<form action="" method="POST">
    <div>
        <label for="customer">Customer</label>
        <select name="customer" id="customer">
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->getFullName()); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div>
        <label for="reference">Order Reference</label>
        <input type="text" name="reference" id="reference" />
    </div>

    <input type="submit" value="Create Booking" />
</form>

</body>
</html>
