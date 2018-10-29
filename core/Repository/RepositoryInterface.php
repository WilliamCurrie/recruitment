<?php

namespace Core\Repository;

use Core\Model\ModelInterface;

/**
 * Interface RepositoryInterface
 *
 * @package Core\Repository
 */
interface RepositoryInterface
{
    /**
     * @param array $data
     *
     * @return ModelInterface
     */
    public function create(array $data): ModelInterface;

    /**
     * @param array $results
     *
     * @return ModelInterface
     */
    public function hydrateObject(array $results): ModelInterface;
}