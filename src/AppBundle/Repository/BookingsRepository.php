<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BookingsRepository extends EntityRepository
{
    public function findAll()
    {
        $qb = $this->createQueryBuilder('b');

        return $qb->getQuery()->getResult();
    }


}