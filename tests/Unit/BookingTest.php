<?php

namespace Test\Unit;

use App\Controllers\Booking;
use PHPUnit\Framework\TestCase;

class BookingTest extends TestCase
{
    public function testGetBookingsReturnsArray()
    {
        $this->assertTrue(
            is_array((new Booking())->getBookings())
        );
    }

    public function testBaseQueryReturnsString()
    {
        $this->assertTrue(
            is_string((new Booking())->baseSelectQuery())
        );
    }

    public function testGetBookingDoesntTreatParamZeroAsAFalsy()
    {
        $this->assertEmpty(
            (new Booking())->getBookings(0)
        );
    }
}