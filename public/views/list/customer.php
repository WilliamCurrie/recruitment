<?php if (!$this->data) header('Location: /customers'); ?>
<?php require __DIR__ . '/../shared/header.php'; ?>

<main>
    <a class="btn btn-primary" href="/add/customer"><i class="fas fa-plus mr-2"></i> Add customer</a>
    <table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First name</th>
            <th scope="col">Second name</th>
            <th scope="col">Address</th>
            <th scope="col">Bookings</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($this->data['customers'] as $customer):
            $customerBookingsCount = count($customer['bookings']);
        ?>
        <tr>
            <td><?= $customer['customerId']; ?></td>
            <td><?= $customer['firstName']; ?></td>
            <td><?= $customer['lastName']; ?></td>
            <td><?= $customer['fullAddress']; ?></td>
            <td><button class="btn btn-outline-primary" onClick="$(this).parents('tr').next().toggle();"><?= $customerBookingsCount; ?> booking<?= $customerBookingsCount !== 1 ? 's' : ''; ?></button></td>
            <td><a class="btn btn-outline-primary" href="/edit/customer/<?= $customer['customerId']; ?>">Edit</a></td>
        </tr>
        <tr <?= count($this->data['customers']) > 1 ? 'class="collapse"' : ''; ?>>
            <td colspan="6">
                <table class="table table-dark">
                    <thead>
                        <?php if($customer['bookings']): ?>
                        <tr>
                            <th scope="col">Booking reference</th>
                            <th scope="col">Customer name</th>
                            <th scope="col">Booking date</th>
                        </tr>
                        <?php endif; ?>
                        <?php if($customer['bookings']): ?>
                        <?php foreach($customer['bookings'] as $booking): ?>
                        <tr>
                            <td><?= $booking['booking_reference']; ?></td>
                            <td><?= $customer['firstName'] . ' ' . $customer['lastName']; ?></td>
                            <td><?= (new DateTime($booking['booking_date']))->format('D dS M Y'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td class="text-center">There are no bookings for <?= $customer['first_name'] . ' ' . $customer['second_name']; ?>.</td>
                        </tr>
                        <?php endif; ?>
                    </thead>
                </table>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</main>

<?php require __DIR__ . '/../shared/footer.php'; ?>