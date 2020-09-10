<?php

namespace Mfisher\Services;

use Doctrine\ORM\EntityRepository;

/**
 * CustomerService deals with backend customer manipulation tasks
 */
class CustomerService
{
    /**
     * Entity Manager
     *
     * @var EntityRepository
     */
    private $customerRepository;

    /**
     * Undocumented function
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getAllCustomers(): array
    {
        return $this->customerRepository->findBy([], ['secondName' => 'ASC']) ?? [];
    }
}