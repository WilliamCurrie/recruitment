<?php

namespace Wranx\Boundary\Booking;

use Wranx\Domain\Booking\Entity\Booking;
use Wranx\Domain\Booking\Persistence\Repository;

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
     * @return array|\stdClass
     */
    public function getBookingsForCustomer(int $customerId): array
    {
        return array_map(function (Booking $booking) {
            return $this->toScalarObject($booking);
        }, $this->repository->getByCustomerId($customerId));
    }

    private function toScalarObject(Booking $booking): \stdClass
    {
        return (object) [
            'id' => $booking->getId(),
            'customer_id' => $booking->getCustomerId(),
            'booking_reference' => $booking->getReference(),
            'booking_date' => $booking->getDate()->format(\DATE_ATOM),
        ];
    }
}
