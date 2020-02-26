<?php

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use App\Entities\Contracts\CustomerContract;
use App\Repositories\Contracts\CustomerRepositoryContract;

class CustomerEntityRepository extends EntityRepository implements CustomerRepositoryContract
{
    public function save(CustomerContract $customer): void
    {
        $this->getEntityManager()->persist($customer);
        $this->getEntityManager()->flush();
    }

    /**
     * @return CustomerContract[]
     */
    public function getAllCustomers(): array
    {
        return $this->findAll();
    }

    /**
     * @param string $direction
     * @return CustomerContract[]
     * @throws \Exception
     */
    public function getAllCustomersSortedBySurname(string $direction = 'desc'): array
    {
        if (! in_array(strtolower($direction), ['asc', 'desc'])) {
            throw new \Exception('Invalid sorting direction. Please use \'ASC\' or \'DESC\'.');
        }

        return $this->findBy(
            [],
            [
                'surname' => $direction
            ]
        );
    }

    public function findById(int $id): ?CustomerContract
    {
        return $this->find($id);
    }

    /**
     * @param string $surname
     * @return CustomerContract[]
     */
    public function findBySurname(string $surname): array
    {
        return $this->findBy([
            'surname' => $surname
        ]);
    }
}
