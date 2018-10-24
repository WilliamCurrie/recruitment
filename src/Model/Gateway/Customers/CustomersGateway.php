<?php

namespace Model\Gateway\Customers;

use Doctrine\ORM\EntityManager;
use Model\Entity\Customer;
use Model\Enums\SortingDirection;
use Model\Gateway\Customers\UseCase\GetAllCustomers;
use Model\Gateway\Customers\UseCase\GetAllCustomersSortedBySecondName;
use Model\Gateway\Customers\UseCase\GetCustomerById;
use Model\Gateway\Customers\UseCase\InsertNewCustomerInterface;

class CustomersGateway implements GetAllCustomers, GetAllCustomersSortedBySecondName, InsertNewCustomerInterface, GetCustomerById
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * CustomersGateway constructor.
     * @param EntityManager $em
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @inheritdoc
     */
    public function getAllCustomers(): array
    {
        return $this->em->getRepository(Customer::class)->findAll();
    }

    /**
     * @inheritDoc
     */
    public function getAllCustomersSortedBySecondName(SortingDirection $direction): array
    {
        $qb = $this->em->createQueryBuilder();

        $qb
            ->select('c')
            ->from(Customer::class, 'c')
            ->orderBy('c.secondName', $direction->getValue());

        $query = $qb->getQuery();

        return $query->getResult();
    }

    /**
     * @inheritdoc
     */
    public function insertNewCustomer(CustomerPayload $cp): Customer
    {
        $entity = new Customer();

        $entity->setFirstName($cp->getCustomerFirstName());
        $entity->setSecondName($cp->getCustomerSecondName());
        $entity->setAddress($cp->getCustomerAddress());
        $entity->setTwitterAlias($cp->getCustomerTwitterAlias());

        $this->em->persist($entity);

        $this->em->flush();

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function findById(int $customerId): ?Customer
    {
        $qb = $this->em->createQueryBuilder();

        $qb
            ->select('c')
            ->from(Customer::class, 'c')
            ->where('c.id = ?1')
            ->setParameter(1, $customerId);

        $query = $qb->getQuery();
        return $query->getOneOrNullResult();
    }
}
