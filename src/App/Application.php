<?php

namespace Wranx\App;

use Wranx\Container\Container;
use Wranx\Contracts\Application\Application as ApplicationContract;
use ReflectionException;
use Wranx\Contracts\Exceptions\Container\NotFoundException;

/**
 * Class Application
 * @package Wranx\Application
 */
class Application extends Container implements ApplicationContract
{
    /**
     * The Base App version.
     *
     * @var string
     */
    protected const VERSION = '0.0.1';

    /**
     * The container's bindings.
     *
     * @var array
     */
    protected $bindings = [];

    /**
     * The container's shared instances.
     *
     * @var array
     */
    protected $instances = [];

    /**
     * All of the registered rebound callbacks.
     *
     * @var array
     */
    protected $reboundCallbacks = [];

    /**
     * Create a new Base App application instance.
     *
     * @return void
     * @throws NotFoundException
     * @throws ReflectionException
     */
    public function __construct()
    {
        $this->registerBaseBindings();
    }

    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version(): string
    {
        return static::VERSION;
    }

    /**
     * Register the basic bindings into the container.
     *
     * @return void
     * @throws ReflectionException|NotFoundException
     */
    protected function registerBaseBindings(): void
    {
        static::setInstance($this);
        $this->instance('app', $this);
        $this->instance(Container::class, $this);
    }
}