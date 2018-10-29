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
     * @param array $results
     *
     * @return ModelInterface
     */
    public function hydrateObject(array $results): ModelInterface;
}