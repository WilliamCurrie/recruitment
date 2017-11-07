<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CustomersRepository extends EntityRepository
{

    function findByLastName($secondName)
    {
          $qb = $this->createQueryBuilder('c')
              ->where('secondName = :lastname')->setParameter('lastname', $secondName);

          return $qb->getQuery()->getResult();
    }


    function findAll()
    {
          $qb = $this->createQueryBuilder('c')
              ->addOrderBy('c.secondName');

          return $qb->getQuery()->getResult();
    }

}