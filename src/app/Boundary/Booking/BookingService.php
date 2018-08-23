<?php

namespace Wranx\Boundary\Booking;

use Wranx\Domain\Booking\Entity\Booking;
use Wranx\Domain\Booking\Persistence\Repository;
use Wranx\Framework\Exception\NotFoundException;

class BookingService
{
    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $customerId
     * @return null|\stdClass
     */
    public function getBookingForCustomer(int $customerId): ?\stdClass
    {
        try {
            $booking = $this->repository->getByCustomerId($customerId);

            return $this->toScalarObject($booking);
        } catch (NotFoundException $e) {
            return null;
        }
    }

    private function toScalarObject(Booking $booking): \stdClass
    {
        return (object) [
            'id' => $booking->getId(),
            'customer_id' => $booking->getCustomerId(),
            'booking_reference' => $booking->getReference(),
            'date' => $booking->getDate()->format(\DATE_ATOM),
        ];
    }
}
