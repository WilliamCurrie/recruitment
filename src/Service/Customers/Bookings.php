<?php

namespace App\Service\Customers;

use App\Entity\Booking;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;

class Bookings
{
    /** @var EntityManagerInterface */
    private $em;
    /** @var CustomerRepository */
    private $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $em->getRepository(Booking::class);
    }

    /**
     * Create or save a booking object
     */
    public function save(Booking $booking)
    {
        $this->em->persist($booking);
        $this->em->flush();
    }

    /**
     * Save multiple bookings at once
     *
     * @param Bookings[] $bookings
     */
    public function saveBatch(array $bookings)
    {
        /** @var Booking $booking */
        foreach ($bookings as $booking) {
            $this->em->persist($booking);
        }

        $this->em->flush();
    }

    /**
     * Get a list of bookings
     *
     * @return Bookings[]
     */
    public function getBookings(array $criteria = [], array $orderBy = [], int $limit = 20): array
    {
        return $this->repository->findBy($criteria, $orderBy, $limit);
    }
}
