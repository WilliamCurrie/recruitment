<?php

namespace Wranx\Domain\Customer\Persistence;

use Wranx\Domain\Customer\Entity\Customer;
use Wranx\Framework\NotFoundException;

interface Repository
{
    public function insert(Customer $customer): void;

    /**
     * @param int|null $id
     * @param string|null $orderBy
     * @throws NotFoundException
     * @return array|Customer[]
     */
    public function find(int $id = null, string $orderBy = null): array;
}
