<?php
require "vendor/autoload.php";

use App\App;
use App\Models\Booking;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

final class BookingTest extends TestCase
{

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $app = (new App)->boot();
    }

    /**
     * @test
     */
    public function test_can_a_booking_be_created()
    {
        $customer = Booking::create([
            'customerID' => '1',
            'booking_reference' => 'Test',
            'booking_date' => Carbon::now()->toDateTimeString()
        ]);

        $this->assertInstanceOf(
            Booking::class,
            $customer
        );
    }

    /**
     * @test
     */
    public function test_can_a_booking_be_found()
    {
        Booking::create([
            'customerID' => '1',
            'booking_reference' => 'Test',
            'booking_date' => Carbon::now()->toDateTimeString()
        ]);

        $this->assertTrue(
            Booking::whereBookingReference('Test')->exists()
        );
    }


    /**
     * @test
     */
    public function test_can_a_booking_be_deleted()
    {
        $customer = Booking::create([
            'customerID' => '1',
            'booking_reference' => 'TestDelete',
            'booking_date' => Carbon::now()->toDateTimeString()
        ]);

        $customer->delete();

        $this->assertFalse(
            Booking::whereBookingReference('TestDelete')->exists()
        );
    }
}



