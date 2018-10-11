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
    @foreach($bookings as $booking)
        <tr>
            <td>#{{ $booking->booking_reference }}</td>
            <td>{{ $booking->customer->getFullName() }}</td>
            <td>{{ $booking->booking_date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr />

<h2>Create new Order</h2>
<form action="" method="POST">
    <div>
        <label for="customer">Customer</label>
        <select name="customer" id="customer">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->getFullName() }}</option>
            @endforeach
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
