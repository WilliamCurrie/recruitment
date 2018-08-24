<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple  App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>
<body>

<div class="container">
    <h1 class="text-center">Simple Database App</h1>

    <h3 class="text-center">Customers</h3>
    <table id="customers" class="table">
        <thead>
            <th>Customer ID</th>
            <th>Title</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Twitter Handle</th>
        </thead>

        <tbody>

        </tbody>
    </table>

    <hr>

    <h3 class="text-center">Bookings</h3>
    <table id="bookings" class="table">
        <thead>
            <th>Booking ID</th>
            <th>Customer ID</th>
            <th>Booking Reference</th>
            <th>Booking Date</th>
        </thead>

        <tbody>

        </tbody>
    </table>
</div>

</body>
</html>
<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "/api/data",
            success: function(data)
            {
                console.log(data.bookings);
                $.each(data.customers, function(i, item) {
                    var tr = $('<tr>').append(
                        $('<td>').text(item.id),
                        $('<td>').text(item.title),
                        $('<td>').text(item.first_name),
                        $('<td>').text(item.last_name),
                        $('<td>').text(item.address),
                        $('<td>').text(item.twitter),
                    );
                    $("#customers").append(tr);
                });

                $.each(data.bookings, function(i, value) {
                    var tr = $('<tr>').append(
                        $('<td>').text(value.id),
                        $('<td>').text(value.customer_id),
                        $('<td>').text(value.booking_reference),
                        $('<td>').text(value.booking_date),
                    );
                    $("#bookings").append(tr);
                });
            }
        });
    });
</script>