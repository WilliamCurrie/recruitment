<?php

namespace Wranx\Manager;

use Wranx\Contracts\Config\ConfigInterface as Config;
use Wranx\Contracts\Database\SQLQueryBuilder as Builder;

/**
 * Class DbManager
 * @package Wranx\Manager
 */
class DbManager extends Manager
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var Builder
     */
    private $builder;

    /**
     * @param Config $config
     * @return DbManager
     */
    public function setConfig(Config $config): DbManager
    {
        $this->config   = $config;
        return $this;
    }

    /**
     * @param Builder $builder
     * @return DbManager implements ManagerInterface
     */
    public function setBuilder(Builder $builder): DbManager
    {
        $this->builder = $builder;
        return $this;
    }

    /**
     * @return void
     */
    public function connect(): DbManager
    {
        if ($this->driver()) {
            $this->driver()->setConnection([
                'dns'        => "mysql:host=".($this->config)('DB_HOST').";dbname=".($this->config)('DB_DATABASE').";charset:uft8;",
                'username'   => ($this->config)('DB_USERNAME'),
                'password'   => ($this->config)('DB_PASSWORD')
            ]);
        }
        return $this;
    }

    /**
     * Get the driver instance
     *
     * @return Builder
     */
    public function driver(): Builder
    {
        return $this->builder;
    }
}