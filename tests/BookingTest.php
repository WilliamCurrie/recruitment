<?php

use Carbon\Carbon;
use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Src\Models\Booking;
use Src\Repos\BookingRepo;

final class BookingTest extends TestCase
{
    private $bookingRepo;

    public function setUp(): void
    {
        $this->bookingRepo = new BookingRepo();
    }
    /**
     * @dataProvider bookingData
     */
    public function testCustomerInstanceCanBeCreatedFromData($data): void
    {
        $this->assertInstanceOf(
            Booking::class,
            new Booking($data)
        );
    }

    /**
     * @dataProvider bookingData
     */
    public function testCanCreateAndDeleteBookings($data, $shouldBeCreated): void
    {
        $booking = new Booking($data);
        $response = $this->bookingRepo->save($booking);
        $created = (bool) $response;
        $this->assertEquals($shouldBeCreated, $response);
        if ($created && $shouldBeCreated === true) {
            $this->assertTrue($this->bookingRepo->delete($response));
        }
    }

    public function bookingData()
    {
        $factory = Factory::create();

        return [
            'with customer' => [[
                'customer_id' => 1,
                'booking_reference' => $factory->word,
                'booking_date' => Carbon::now(),
            ], true],
            'without customer' => [[
                'customer_id' => null,
                'booking_reference' => $factory->word,
                'booking_date' => Carbon::now(),
            ], 'customer_id not present'],
            'with random customer id' => [[
                'customer_id' => 0,
                'booking_reference' => $factory->word,
                'booking_date' => Carbon::now(),
            ], 'Customer not found']
        ];
    }
}