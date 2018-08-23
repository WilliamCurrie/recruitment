<?php

namespace Wranx\Domain\Customer\Persistence\Illuminate;

use Illuminate\Database\Connection;
use Wranx\Domain\Customer\Entity\Customer;
use Wranx\Domain\Customer\Persistence\Repository;
use Wranx\Framework\NotFoundException;

class IlluminateRepository implements Repository
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function insert(Customer $customer): void
    {
        $this->connection->table('customers')->insert([
            'title' => $customer->getTitle(),
            'first_name' => $customer->getFirstName(),
            'last_name' => $customer->getLastName(),
            'address' => $customer->getAddress(),
            'twitter_alias' => $customer->getTwitterHandle()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getById(int $id): Customer
    {
        if (!$row = $this->connection->table('customers')->where('id', $id)->first()) {
            throw new NotFoundException("Customer with ID {$id} does not exist");
        }

        return $this->hydrateCustomer($row);
    }

    /**
     * @inheritdoc
     */
    public function get(string $orderBy = null): array
    {
        $query = $this->connection->table('customers');

        if ($orderBy) {
            $query->orderBy($orderBy);
        }

        return array_map(function (\stdClass $row) {
            return $this->hydrateCustomer($row);
        }, $query->get()->toArray());
    }

    private function hydrateCustomer(\stdClass $row): Customer
    {
        $customer = new Customer(
            $row->title,
            $row->first_name,
            $row->last_name,
            $row->address,
            $row->twitter_alias
        );

        return $customer->setId($row->id);
    }
}
