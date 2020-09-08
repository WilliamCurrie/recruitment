<?php
include_once "header.php";
?>
    <h1>My Simple App</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($customer as $id => $value) {
        ?>
        <tr>
            <td>
                <?php echo $value['firstname']; ?>

                <?php echo $value['lastname']; ?>
            </td>
<td>
                <?php echo $value['address']; ?>
            </td>
            <td>
                <a href="/bookings/<?php echo $id; ?>">
                    View bookings
                </a>
            </td>
        </tr>
    <?php } ?>
        </tbody>
    </table>
<?php
include_once "footer.php";