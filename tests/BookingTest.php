<?php
use PHPUnit\Framework\TestCase;
require_once 'vendor/fzaninotto/faker/src/autoload.php';

class BookingTest extends TestCase
{
    
    public function testBookingRefCreationAndIntegrity(): void
    {
        $faker = Faker\Factory::create();
        $booking = new Booking(null);
        
        // test that the booking_reference was created
        $this->assertNotEquals($booking->booking_reference, null);
        // and that the booking ref was 5 characters in length
        $this->assertEquals(5, strlen($booking->booking_reference));
    }
    
}