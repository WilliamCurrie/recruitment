<?php

class BookingRepositoryTest extends \PHPUnit\Framework\TestCase
{
    private $container;

    /** @var \App\Repository\BookingRepository */
    private $repo;

    public function setUp()
    {
        $containerBuilder = new \DI\ContainerBuilder();
        $this->container = $containerBuilder->build();

        $this->repo = $this->container->get('App\\Repository\\BookingRepository');

        parent::setUp();
    }

    public function testGetAll()
    {
        $bookings = $this->repo->getAll();

        $this->assertNotNull($bookings);

        /** @var \App\Entity\Booking $booking */
        foreach ($bookings as $booking)
        {
            $this->assertInstanceOf(\App\Entity\Booking::class, $booking);
        }
    }

    public function testGetById()
    {
        /** @var \App\Entity\Booking $booking */
        $booking = $this->repo->getById(1);

        $this->assertInstanceOf(\App\Entity\Booking::class, $booking);
        $this->assertNotNull($booking->getCustomerId());
        $this->assertNotNull($booking->getBookingDate());
        $this->assertNotNull($booking->getBookingReference());
        $this->assertNotNull($booking->getId());
    }

    public function testGetByCustomerId()
    {
        $bookings = $this->repo->getByCustomerId(1);

        $this->assertNotNull($bookings);

        /** @var \App\Entity\Booking $booking */
        foreach ($bookings as $booking)
        {
            $this->assertInstanceOf(\App\Entity\Booking::class, $booking);
        }
    }
}