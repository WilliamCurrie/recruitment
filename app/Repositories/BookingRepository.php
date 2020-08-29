<?php

namespace Wranx\Application\Repositories;

use Wranx\Application\Contracts\Repositories\BookingRepositoryInterface;
use Wranx\Contracts\Manager\ManagerInterface as Manager;
use Wranx\Contracts\Support\Collection;

/**
 * Class BookingRepository
 * @package Wranx\Application\Repositories
 */
class BookingRepository implements BookingRepositoryInterface
{
    /**
     * @var Manager
     */
    private $queryBuilder;

    /**
     * @var string $tableName
     */
    private $tableName = "bookings";

    /**
     * BookingRepository constructor.
     * @param Manager $queryBuilder
     */
    public function __construct(Manager $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder->driver();
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        // TODO: Implement orderBy() method.
    }

    /**
     * @param array $values
     * @return Collection
     */
    public function create(array $values = []): Collection
    {
        // TODO: Implement create() method.
    }

    /**
     * @param string $column
     * @return Collection
     */
    public function orderBy(string $column): Collection
    {
        // TODO: Implement orderBy() method.
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
}