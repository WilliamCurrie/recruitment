<?php require APP_ROOT . "/views/inc/header.php"; ?>

<table  id="customers" class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Reference</th>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Twitter Alias</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['bookings'] as $id => $booking): ?>
            <tr>
                <th scope="row"><?= $booking->b_id ?></th>
                <td><?= $booking->b_ref ?></td>
                <td><?= $booking->b_date ?></td>
                <td><?= formatNames($booking->f_name,$booking->s_name); ?></td>
                <td><?= $booking->twitter ?></td>
            </tr>

        <?php endforeach; ?>


    </tbody>
</table>

<?php require APP_ROOT . "/views/inc/footer.php"; ?>