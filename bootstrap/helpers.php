<?php

use Wranx\Config\Config;
use Wranx\Container\Container;
use Wranx\Contracts\Application\Application;
use Wranx\Contracts\Exceptions\Container\NotFoundException;
use Wranx\Support\WranxCollection;

if (! function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param string|null $abstract
     * @param array $parameters
     * @return mixed|Application
     * @throws ReflectionException
     * @throws NotFoundException
     */
    function app($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }

        return Container::getInstance()->make($abstract, $parameters);
    }
}

if (! function_exists('config')) {
    /**
     * Get / set the specified configuration value.
     *
     *
     * @param array|string|null $key
     * @return mixed|Config
     * @throws NotFoundException
     * @throws ReflectionException
     */
    function config($key = null)
    {
        if (is_null($key)) {
            return app('config');
        }

        return app('config')->get($key);
    }
}

if (! function_exists('array_flatten')) {
    /**
     * @param $array
     * @param $depth
     * @return array|bool
     */
    function array_flatten($array, $depth = INF)
    {
        $result = [];

        foreach ($array as $item) {
            if (! is_array($item)) {
                $result[] = $item;
            } else {
                $values = $depth === 1
                    ? array_values($item)
                    : array_flatten($item, $depth - 1);

                foreach ($values as $value) {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }
}

if (! function_exists('collect')) {
    /**
     * Create a collection from the given value.
     *
     * @param mixed $value
     * @return WranxCollection
     */
    function collect($value = null)
    {
        return new WranxCollection($value);
    }
}

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (! function_exists('first')) {
    function first($array, callable $callback = null, $default = null)
    {
        if (is_null($callback)) {
            if (empty($array)) {
                return value($default);
            }

            foreach ($array as $item) {
                return $item;
            }
        }

        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }

        return value($default);
    }
}