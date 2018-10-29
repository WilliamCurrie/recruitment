<?php

namespace Core\Configuration;

use Symfony\Component\Yaml\Yaml;

/**
 * Class Configuration
 *
 * @package Core\Configuration
 */
class Configuration
{
    /** @var array */
    private $config;

    /**
     * Configuration constructor.
     */
    public function __construct()
    {
        $this->config = Yaml::parseFile(__DIR__ . "/../../app/config/config.yml");
    }

    /**
     * @return array
     */
    public function getDbConfig()
    {
        return $this->config['db'];
    }
}
