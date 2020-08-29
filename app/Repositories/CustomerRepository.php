<?php

namespace Wranx\Application\Repositories;

use Wranx\Application\Contracts\Repositories\CustomerRepositoryInterface;
use Wranx\Contracts\Manager\ManagerInterface as Manager;
use Wranx\Contracts\Support\Collection;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var Manager
     */
    private $queryBuilder;

    /**
     * @var string $tableName
     */
    private $tableName = "customers";

    /**
     * CustomerRepository constructor.
     * @param Manager $queryBuilder
     */
    public function __construct(Manager $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder->driver();
    }

    /**
     * Save new Customer
     *
     * @param array $values
     * @return Collection
     */
    public function create(array $values = []): Collection
    {
        return $this->queryBuilder
            ->table($this->tableName)
            ->insert($values)
            ->exec();
    }

    /**
     * Order By
     *
     * @param string $column
     * @return Collection
     */
    public function orderBy(string $column): Collection
    {
        return $this->queryBuilder
            ->table($this->tableName)
            ->select(["*"])
            ->orderBy($column)
            ->exec();
    }

    /**
     * Find By Column Name
     *
     * @param string $column
     * @param $value
     * @return Collection
     */
    public function findBy(string $column, $value): Collection
    {
        return $this->queryBuilder
            ->table($this->tableName)
            ->select(["*"])
            ->where($column, '=', $value)
            ->exec();
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->queryBuilder
            ->table($this->tableName)
            ->select(["*"])
            ->exec();
    }
}