<?php

namespace Wranx\Domain\Customer\Persistence;

use Wranx\Domain\Customer\Entity\Customer;
use Wranx\Framework\NotFoundException;

interface Repository
{
    public function insert(Customer $customer): void;

    /**
     * @param int $id
     * @throws NotFoundException
     * @return Customer
     */
    public function getById(int $id): Customer;

    /**
     * @param string|null $orderBy
     * @return array|Customer[]
     */
    public function get(string $orderBy = null): array;
}
