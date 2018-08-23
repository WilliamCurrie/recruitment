<?php

namespace Wranx\Domain\Booking\Entity;

use PHPUnit\Framework\TestCase;

class BookingTest extends TestCase
{
    public function test_booking_entity_can_be_constructed()
    {
        $booking = new Booking(10, 'REF123', new \DateTimeImmutable('2018-08-23'));

        $booking->setId(1);

        $this->assertEquals(1, $booking->getId());
        $this->assertEquals(10, $booking->getCustomerId());
        $this->assertEquals('REF123', $booking->getReference());
        $this->assertEquals(new \DateTimeImmutable('2018-08-23'), $booking->getDate());
    }
}
