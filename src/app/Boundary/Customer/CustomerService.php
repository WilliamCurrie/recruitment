<?php

namespace Wranx\Boundary\Customer;

use Wranx\Domain\Customer\Entity\Customer;
use Wranx\Domain\Customer\Persistence\Repository;

class CustomerService
{
    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return an array of all Customer records as scalar objects
     *
     * @return array|\stdClass
     */
    public function getCustomers(): array
    {
        return array_map(function (Customer $customer) {
            return $this->toScalarObject($customer);
        }, $this->repository->get('last_name'));
    }

    private function toScalarObject(Customer $customer): \stdClass
    {
        return (object) [
            'id' => $customer->getId(),
            'title' => $customer->getTitle(),
            'first_name' => $customer->getFirstName(),
            'last_name' => $customer->getLastName(),
            'address' => $customer->getAddress(),
            'twitter' => $customer->getTwitterHandle(),
        ];
    }
}
