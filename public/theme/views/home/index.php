<html>
    <?php require_once(__DIR__ . '../../shared/header.php');
          require_once(__DIR__ . '/components/CustomerTable.php');
          ?>

    <body class="container">
        <div class="row">
            <div class="col-md-12 mt-3 mb-3">
                <h2 class="text-center">Customer(s)</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo generateTable($data['customers']) ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Bookings</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Booking Reference</th>
                            <th>Booking Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($data['bookings'])) {
                            echo "<tr><td colspan='2'>There is no bookings for this customer</td></tr>";
                        }
                        else {
                            foreach ($data['bookings'] as $booking){
                                    print "<tr> 
                                            <td>${booking['booking_reference']}</td> 
                                            <td>${booking['booking_date']}</td> 
                                        </tr>";
                            }
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>