<?php


use Bff\Models\Booking;
use PHPUnit\Framework\TestCase;

class BookingTest extends TestCase
{

    public function testGetBookings()
    {

        $result = Booking::getBookings();
        $this->assertEquals(true, is_array($result) && !empty($result), "bookings array is not returned");

        $result = Booking::getBookings("1");
        $this->assertEquals(true, is_array($result) && !empty($result), "bookings not returned");

        $result = Booking::getBookings("rubbish");
        $this->assertEquals(true, is_array($result) && empty($result), "bookings should be empty");
    }
}
