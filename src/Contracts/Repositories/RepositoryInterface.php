<?php

namespace Wranx\Contracts\Repositories;

use Wranx\Contracts\Support\Collection;

/**
 * Interface RepositoryInterface
 * @package Wranx\Contracts\Repositories
 */
interface RepositoryInterface
{
    /**
     * @param array $values
     * @return Collection
     */
    public function create(array $values = []): Collection;

    /**
     * @param string $column
     * @return Collection
     */
    public function orderBy(string $column): Collection;

    /**
     * @param string $column
     * @param $value
     * @return Collection
     */
    public function findBy(string $column, $value): Collection;

    /**
     * @return Collection
     */
    public function findAll(): Collection;
}