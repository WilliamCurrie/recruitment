<?php

namespace Framework;

use Framework\Contracts\ConnectionContract;
use Illuminate\Database\Capsule\Manager as Capsule;
use Framework\Contracts\ConfigContract;

class Connection implements ConnectionContract
{
    private $capsule;

    private $config;

    public function __construct(ConfigContract $config)
    {
        $this->config = $config->get('connection.'.$config->get('connection.use'));

        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => $this->config['type'],
            "host" => $this->config['host'],
            "database" => $this->config['dbname'],
            "username" => $this->config['user'],
            "password" => $this->config['pass'],
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
        $this->capsule = $capsule;
    }
}
