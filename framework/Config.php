<?php

namespace Framework;

use Framework\Contracts\ConfigContract;
use Yosymfony\ConfigLoader\FileLocator;
use Yosymfony\ConfigLoader\ConfigLoader;
use Yosymfony\ConfigLoader\Loaders\YamlLoader;

class Config implements ConfigContract
{
    /**
     * @var ConfigLoader
     */
    private $config;

    public function __construct()
    {
        $locator = new FileLocator([__DIR__.'/../src/config']);
        $this->config = new ConfigLoader([
            new YamlLoader($locator)
        ]);
    }

    public function get($key)
    {
        $key = explode('.', $key);
        $config = $key[0];
        array_shift($key);
        $key = implode('.', $key);

        return $this->config->load($config.'.yml')->get($key, null);
    }
}
