<?php

namespace Mfisher\Tests\Entities;

use DateTime;
use Mfisher\Entities\Booking;
use Mfisher\Entities\Customer;
use PHPUnit\Framework\TestCase;

/**
 * Booking tests
 */
class BookingTest extends TestCase
{
    /**
     * Test Booking::getId()
     */
    public function testGetId()
    {
        $booking = new Booking();
        $booking->setId(1);

        $this->assertSame(1, $booking->getId());
    }

    /**
     * Test Booking::getCustomer()
     */
    public function testGetCustomer()
    {
        $customer = new Customer();
        $customer->setFirstName('foo');

        $booking = new Booking();
        $booking->setCustomer($customer);

        $this->assertSame($customer, $booking->getCustomer());
    }

    /**
     * Test Booking::getBookingReference()
     */
    public function testGetBookingReference()
    {
        $booking = new Booking();
        $booking->setBookingReference('foo');

        $this->assertSame('foo', $booking->getBookingReference());
    }

    /**
     * Test Booking::getBookingDate()
     */
    public function testGetBookingDate()
    {
        $date = new DateTime();
        $booking = new Booking();
        $booking->setBookingDate($date);

        $this->assertSame($date, $booking->getBookingDate());
    }

    /**
     * Test Booking::getBookingDateFormated()
     */
    public function testGetBookingDateFormated()
    {
        $date = new DateTime();
        $booking = new Booking();
        $booking->setBookingDate($date);

        $this->assertSame($date->format('D dS M Y'), $booking->getBookingDateFormated());
    }
}