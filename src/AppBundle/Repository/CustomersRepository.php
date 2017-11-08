<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CustomersRepository extends EntityRepository
{

    /**
     * Normally I would use the "magic" method ->find()
     *
     * @param $id
     * @return array
     */
    public function findById($id)
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.id = :id')->setParameter('id', $id);

        return $qb->getQuery()->getResult();
    }

    public function findByLastName($secondName)
    {
          $qb = $this->createQueryBuilder('c')
              ->where('c.secondName = :secondName')->setParameter('secondName', $secondName);

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