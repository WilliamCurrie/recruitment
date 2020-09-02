<?php

namespace Wranx\Config;

use RuntimeException;
use Symfony\Component\Dotenv\Dotenv;
use Wranx\Contracts\Config\ConfigInterface;

/**
 * Class Config
 * @package Wranx\Config
 */
class Config implements ConfigInterface
{
    /**
     * @var Dotenv $config
     */
    private $config;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->config = new Dotenv;
        $this->loadConfig(__DIR__.'/../../.env');
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function __invoke(string $key)
    {
        return $_ENV[$key] ?? null;
    }

    /**
     * @param string $path
     * @return $this
     */
    private function loadConfig(string $path): self
    {
        if (!file_exists($path)) {
            throw new RuntimeException("The config file doesn't exist");
        }
        $this->config->load($path);
        return $this;
    }
}