<?php

namespace Framework;

use DI\FactoryInterface;
use Framework\Contracts\ConfigContract;
use Framework\Contracts\RouterContract;

class Router implements RouterContract
{
    private $config;

    private $namespace;

    public function __construct(ConfigContract $config, FactoryInterface $factory)
    {
        $this->config = $config->get('routes.routes');
        $this->namespace = $config->get('routes.namespace');
        $router = new \Bramus\Router\Router();
        foreach ($this->config as $route => $methods) {
            foreach ($methods as $method => $properties) {
                $router->$method($route, function () use ($properties, $factory, $config) {
                    $action = $properties['action'];
                    $controller = $this->namespace.$properties['controller'];
                    $controller = $factory->make($controller);
                    return $controller->$action();
                });
            }
        }
        $router->run();
    }
}
