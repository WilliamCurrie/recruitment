<?php

namespace Wranx\Application\Services;

use Wranx\Application\Contracts\Repositories\CustomerRepositoryInterface as Repository;
use Wranx\Contracts\Support\Collection;

/**
 * Class CustomerService
 * @package Wranx\Application\Services
 */
class CustomerService
{
    /**
     * @var Repository $repository
     */
    private $repository;

    /**
     * CustomerService constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Save a new customer
     *
     * @param array $data
     * @return Collection
     */
    public function create(array $data): Collection
    {
        return $this->repository->create($data);
    }

    /**
     * Order By
     *
     * @param string $column
     * @return Collection
     */
    public function orderBy(string $column): Collection
    {
        return $this->repository->orderBy($column);
    }

    /**
     * Find All Records
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->repository->findAll();
    }

    /**
     * Find a record by column name
     *
     * @param string $column
     * @param $value
     * @return Collection
     */
    public function findBy(string $column, $value): Collection
    {
        return $this->repository->findBy($column, $value);
    }
}