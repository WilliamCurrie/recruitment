<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CustomersRepository extends EntityRepository
{

    public function findByLastName($secondName)
    {
          $qb = $this->createQueryBuilder('c')
              ->where('secondName = :lastname')->setParameter('lastname', $secondName);

          return $qb->getQuery()->getResult();
    }


    public function findAll($sort = false)
    {
          $qb = $this->createQueryBuilder('c');
          if($sort){
              $qb->addOrderBy('c.secondName');
          }

          return $qb->getQuery()->getResult();
    }

}