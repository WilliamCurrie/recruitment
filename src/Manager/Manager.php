<?php

namespace Wranx\Manager;

use Wranx\Contracts\Manager\ManagerInterface;

/**
 * Class Manager
 * @package Wranx\Manager
 */
abstract class Manager implements ManagerInterface
{
    /**
     * @return DbManager
     */
    abstract public function connect(): DbManager;
}