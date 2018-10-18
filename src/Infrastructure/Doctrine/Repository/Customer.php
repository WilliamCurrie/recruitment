<?php
namespace App\Infrastructure\Doctrine\Repository;


use App\Domain\Entity\Customer\RepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;


class Customer extends EntityRepository implements RepositoryInterface
{
    public function findAll()
    {
        $query = $this->createQueryBuilder('c')->select('c')->getQuery();
        return $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

    public function findById($customerId)
    {
        $query = $this->createQueryBuilder('c')->select('c')->where('c.id = :id')->setParameter('id', $customerId)->getQuery();
        try {
            return  $query->getSingleResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        } catch (NoResultException $e) {
            return null;
        } catch (NonUniqueResultException $e) {
            throw $e;
        }
    }
}