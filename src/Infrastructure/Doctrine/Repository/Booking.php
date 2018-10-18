<?php
namespace App\Infrastructure\Doctrine\Repository;


use App\Domain\Entity\Booking\RepositoryInterface;
use Doctrine\ORM\EntityRepository;


class Booking extends EntityRepository implements RepositoryInterface
{
    public function findAll()
    {
        $query = $this->createQueryBuilder('b')->select('b')->getQuery();
        return $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

    public function findBookingsByCustomerId($customerId)
    {
        $query = $this->createQueryBuilder('b')->select('b')->where('b.customer_id = :customer_id')->setParameter('customer_id', $customerId)->getQuery();
        return $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
}