<?php

namespace Core\Model;

/**
 * Interface ModelInterface
 *
 * @package Core\Model
 */
interface ModelInterface
{
    /**
     * @param array $row
     *
     * @return mixed
     */
    public static function hydrate(array $row);
}