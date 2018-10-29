<?php

namespace App\Repository;

use App\Entity\Customer;
use Aura\SqlQuery\QueryFactory;
use Core\Error\MissingEntityDetailException;
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

    /**
     * @param array $data
     *
     * @return ModelInterface
     * @throws MissingEntityDetailException
     */
    public function create(array $data): ModelInterface
    {
        if (!isset($data['firstName']) || !isset($data['lastName']) || !isset($data['address']))
        {
            throw new MissingEntityDetailException('You must provide a firstName, lastName and address to create a customer');
        }

        $queryFactory = new QueryFactory('mysql');

        $insert = $queryFactory->newInsert();
        $insert->into($this->table)
            ->cols([
                'firstName',
                'lastName',
                'address',
                'twitterAlias',
            ])
            ->bindValues([
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'address' => $data['address'],
                'twitterAlias' => $data['twitterAlias'] ?? null
            ]);


        $sth = $this->db->prepare($insert->getStatement());

        $sth->execute($insert->getBindValues());

        // get the last insert ID
        $name = $insert->getLastInsertIdName('id');
        $data['id'] = $this->db->lastInsertId($name);

        return $this->hydrateObject($data);
    }

    /**
     * @param array $results
     *
     * @return ModelInterface
     * @throws MissingEntityDetailException
     */
    public function hydrateObject(array $results): ModelInterface
    {
        return Customer::hydrate($results);
    }
}
