<?php

namespace App\Tests\Service\Customers;

use App\Entity\Booking;
use App\Entity\Customer;
use App\Repository\BookingRepository;
use App\Service\Customers\Bookings;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class BookingsTest extends TestCase
{
    /** @var Bookings */
    private $sut;
    /** @var EntityManagerInterface */
    private $em;

    public function setUp()
    {
        parent::setUp();

        // mock our repo
        $repo = $this->createMock(BookingRepository::class);

        // mock em
        $em = $this->createMock(EntityManagerInterface::class);
        $em->expects($this->any())
            ->method('getRepository')
            ->willReturn($repo);

        $this->em = $em;
        $this->sut = new Bookings($em);
    }

    /**
     * @test
     */
    public function saveShouldCallPersistAndFlush()
    {
        $this->em->expects($this->once())->method('persist');
        $this->em->expects($this->once())->method('flush');

        $customer = new Customer('Josh', 'Freeman');
        $booking = new Booking($customer, 'Test');

        $this->sut->save($booking);
    }

    /**
     * @test
     */
    public function saveBatchShouldCallPersistNTimes()
    {
        $times = 10;

        $this->em->expects($this->exactly($times))->method('persist');
        $this->em->expects($this->once())->method('flush');

        $bookings = range(1, $times);

        $this->sut->saveBatch($bookings);
    }
}
