<?php

namespace Model\Gateway\Bookings;

use Doctrine\ORM\EntityManager;
use Model\Entity\Booking;
use Model\Gateway\Bookings\UseCase\GetAllBookings;
use Model\Gateway\Bookings\UseCase\GetBookingsByCustomerId;

class BookingsGateway implements GetBookingsByCustomerId, GetAllBookings
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * BookingsGateway constructor.
     * @param EntityManager $entityManager
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @inheritDoc
     */
    public function getBookingsByCustomerId(int $customerId): array
    {
        $qb = $this->em->createQueryBuilder();

        $qb
            ->select('B')
            ->from(Booking::class, 'B')
            ->where('B.customerId = ?1')
            ->setParameter(1, $customerId);

        $query = $qb->getQuery();

        $result = $query->getResult();

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getAllBookings(): array
    {
        $qb = $this->em->createQueryBuilder();

        $qb
            ->select('B')
            ->from(Booking::class, 'B');

        $query = $qb->getQuery();

        $result = $query->getResult();

        return $result;
    }
}
