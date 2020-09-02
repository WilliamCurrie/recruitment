<?php

namespace Wranx\Contracts\Container;

use Closure;
use ReflectionException;
use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * Interface ContainerInterface
 * @package Wranx\Contracts\Container
 */
interface Container extends PsrContainerInterface
{
    /**
     * @param  string  $abstract
     * @param null $concrete
     * @return void
     */
    public function bind(string $abstract, $concrete = NULL): void;

    /**
     * Resolve the given type from the container.
     *
     * @param string $abstract
     * @param array $parameters
     * @return mixed
     *
     * @throws ReflectionException
     */
    public function make($abstract, array $parameters = []);

    /**
     * Determine if the given abstract type has been bound.
     *
     * @param  string  $abstract
     * @return bool
     */
    public function bound($abstract): bool;

    /**
     * resolve single
     *
     * @param $id
     * @return mixed|object
     */
    public function resolve($id);

    /**
     * Register an existing instance as shared in the container.
     *
     * @param string $abstract
     * @param mixed $instance
     * @return mixed
     * @throws ReflectionException
     */
    public function instance($abstract, $instance);

    /**
     * Register a shared binding in the container.
     *
     * @param  string  $abstract
     * @param  Closure|string|null  $concrete
     * @return void
     */
    public function singleton($abstract, $concrete = null): void;

    /**
     * Flush the container of all bindings and resolved instances.
     *
     * @return void
     */
    public function flush(): void;
}