<?php

namespace App\Repository;

use App\Entity\Customer;
use Core\Model\ModelInterface;
use Core\Repository\AbstractRepository;
use Core\Repository\RepositoryInterface;

/**
 * Class CustomerRepository
 *
 * @package App\Repository
 */
class CustomerRepository extends AbstractRepository implements RepositoryInterface
{
    protected $table = 'customers';

    public function save()
    {
        //@todo add functionality
    }

    /**
     * @param array $results
     *
     * @return array|mixed
     */
    public function hydrateObject(array $results): ModelInterface
    {
        return Customer::hydrate($results);
    }
}
