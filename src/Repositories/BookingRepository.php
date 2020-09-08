<?php

namespace Mfisher\Repositories;

use Booking;
use Doctrine\ORM\EntityRepository;

/**
 * Repostory for Booking Entity
 */
class BookingRepository extends EntityRepository
{
    /**
     * Fetches bookings by customer id
     *
     * @param integer $customerId
     *
     * @return Booking[]
     */
    public function findByCustomerId(int $customerId): array
    {
        $result = $this->_em
          ->createQueryBuilder()
          ->select('b.*')
          ->from('Booking', 'b')
          ->where('b.customer = :customerId')
          ->setParameter(':customerId', $customerId)
          ->getQuery()
          ->getResult();
        
        return is_array($result) ? $result : [];
    }
}