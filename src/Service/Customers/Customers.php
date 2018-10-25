<?php

namespace App\Service\Customers;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;

class Customers
{
    /** @var EntityManagerInterface */
    private $em;
    /** @var CustomerRepository */
    private $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $em->getRepository(Customer::class);
    }

    /**
     * Create or save a customer object
     */
    public function save(Customer $customer)
    {
        $this->em->persist($customer);
        $this->em->flush();
    }

    /**
     * Find specific customer by their ID
     */
    public function getCustomer(string $customerId): ?Customer
    {
        return $this->repository->find($customerId);
    }

    /**
     * Find a specific customer by their legacy ID
     */
    public function getCustomerByLegacyId(int $customerId): ?Customer
    {
        return $this->repository->findOneBy(['legacyId' => $customerId]);
    }

    /**
     * Get a list of customers
     *
     * @return Customer[]
     */
    public function getCustomers(array $criteria = [], array $orderBy = [], int $limit = 20, int $offset = 0): array
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Get a list of customers sorted by their surname, ascending
     */
    public function getCustomersSortedBySurname($limit = 20): array
    {
        return $this->getCustomers([], ['secondName' => 'asc'], $limit);
    }
}
