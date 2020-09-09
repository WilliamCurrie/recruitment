<?php

namespace Mfisher\Services;

use Doctrine\ORM\EntityRepository;
use Mfisher\Repositories\BookingRepository;

/**
 * BookingService implements working functional components
 */
class BookingService
{
    /**
     * Booking Repository
     *
     * @var EntityRepository
     */
    private $bookingRepository;

    /**
     * Constructor for BookingService
     *
     * @param EntityRepository $bookingRepository
     */
    public function __construct(EntityRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Fetches Booking by customer id
     *
     * @param integer $customerId
     *
     * @return Booking[]
     */
    public function getBookingsByCustomerId(int $customerId): array
    {
        return $this->bookingRepository->findBy(['customer' => $customerId]) ?? [];
    }
}