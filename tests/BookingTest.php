<?php

declare(strict_types=1);

define('DB_HOST', 'database');
define('DB_USER', 'testuser');
define('DB_PASS', 'password');
define('DB_NAME', 'test');
define('DB_COLL', 'utf8mb4');

use PHPUnit\Framework\TestCase;
use Wranx\Booking;


class BookingTest extends TestCase
{
    public function testBookingCustomerId()
    {
        $booking = new Booking();
        $booking->setCustomerId(1);
        $this->assertEquals($booking->getCustomerId(), 1);
    }
}
