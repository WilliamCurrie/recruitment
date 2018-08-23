<?php

namespace Wranx\Domain\Booking\Persistence\Illuminate;

use Illuminate\Database\Connection;
use Wranx\Domain\Booking\Entity\Booking;
use Wranx\Domain\Booking\Persistence\Repository;
use Wranx\Framework\Exception\NotFoundException;

class IlluminateRepository implements Repository
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function insert(Booking $booking): void
    {
        $this->connection->table('bookings')->insert([
            'customer_id' => $booking->getCustomerId(),
            'booking_reference' => $booking->getReference(),
            'booking_date' => $booking->getDate()->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * @param int $customerId
     * @throws NotFoundException
     * @return Booking
     */
    public function getByCustomerId(int $customerId): Booking
    {
        if (!$row = $this->connection->table('bookings')->where('customer_id', $customerId)->first()) {
            throw new NotFoundException("Booking with Customer ID {$customerId} does not exist");
        }

        $booking = new Booking(
            $row->customer_id,
            $row->booking_reference,
            new \DateTimeImmutable($row->booking_date)
        );

        return $booking->setId($row->id);
    }
}
