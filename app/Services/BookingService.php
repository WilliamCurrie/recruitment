<?php

namespace Wranx\Application\Services;

use Wranx\Application\Contracts\Repositories\BookingRepositoryInterface as Repository;
use Wranx\Contracts\Support\Collection;

/**
 * Class BookingService
 * @package Wranx\Application\Services
 */
class BookingService
{
    /**
     * @var Repository $repository
     */
    private $repository;

    /**
     * BookingService constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
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