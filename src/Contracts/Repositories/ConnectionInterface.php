<?php

namespace Wranx\Contracts\Repositories;

interface ConnectionInterface
{
    /**
     * @param array $connection
     */
    public function setConnection(array $connection): void;
}