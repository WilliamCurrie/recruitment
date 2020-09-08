<?php
include_once "header.php";
?>
    <h1>My Simple App</h1>
    <hr>
<h3>Bookings for <?php echo $customer->firstname; ?></h3>
    <hr>
    <a href="/">Back to customers</a>
<?php if (is_array($bookings) && count($bookings)) { ?>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($bookings as $id => $value) { ?>
            <tr>
                <td>
                    <?php echo $value['customer_name']; ?>

                    <?php echo $value['booking_reference']; ?>
                </td>
                <td>
                    <?php echo $value['booking_date']; ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php
} else { ?>
    <p>No bookings were found.</p>
<?php }
include_once "footer.php";