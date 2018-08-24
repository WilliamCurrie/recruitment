<?php

namespace Wranx\Boundary\Booking;

use PHPUnit\Framework\TestCase;
use Wranx\Domain\Booking\Entity\Booking;
use Wranx\Domain\Booking\Persistence\Repository;

class BookingServiceTest extends TestCase
{
    /** @var  Repository */
    private $repository;
    /** @var  BookingService */
    private $service;

    public function setUp()
    {
        $this->repository = $this->prophesize(Repository::class);
        $this->service = new BookingService($this->repository->reveal());
    }

    public function test_get_bookings_for_customer_returns_an_array_of_scalar_objects_containing_booking_data()
    {
        $this->repository->getByCustomerId(1)->willReturn([
            (new Booking(1, 'REF1', new \DateTimeImmutable('2018-08-24 08:22:00')))->setId(1),
            (new Booking(1, 'REF2', new \DateTimeImmutable('2018-08-24 08:22:00')))->setId(2),
        ]);

        $bookings = $this->service->getBookingsForCustomer(1);

        $this->assertEquals(1, $bookings[0]->id);
        $this->assertEquals('REF1', $bookings[0]->booking_reference);
        $this->assertEquals('2018-08-24T08:22:00+00:00', $bookings[0]->booking_date);

        $this->assertEquals(2, $bookings[1]->id);
        $this->assertEquals('REF2', $bookings[1]->booking_reference);
        $this->assertEquals('2018-08-24T08:22:00+00:00', $bookings[1]->booking_date);
    }
}
