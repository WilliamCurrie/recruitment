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
<p>Added {{$customer->first_name}} {{$customer->second_name}} to the db.</p>

@if($bookings && $customer)
    <h2>Orders for {{$customer->fullName}}:</h2>
    <table>
        <thead>
        <tr>
            <td>Booking Reference</td>
            <td>Booking Date</td>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{$booking->booking_reference}}</td>
                <td>{{$booking->booking_date}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

<h2>Customers:</h2>
<table>
    <thead>
        <tr>
            <td>Full Name</td>
            <td>First Name</td>
            <td>Second Name</td>
            <td>Bookings</td>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                @if($customer->bookings->count() > 0)
                    <td><a href="?customerId={{$customer->id}}">{{$customer->fullName}}</a></td>
                @else
                    <td>{{$customer->fullName}}</td>
                @endif
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->second_name}}</td>
                <td>{{$customer->bookings->count()}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>