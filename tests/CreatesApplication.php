<?php

namespace Wranx\Tests;

use Mockery;
use ReflectionClass;
use ReflectionException;

trait CreatesApplication
{
    /**
     * Tear down
     *
     * @return void
     */
    public function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }

    /**
     * Return value of a private property using ReflectionClass
     *
     * @param $instance
     * @param string $property
     *
     * @return mixed
     * @throws ReflectionException
     */
    protected function getProperty($instance, $property)
    {
        $reflectedClass = new ReflectionClass($instance);
        $reflection     = $reflectedClass->getProperty($property);
        $reflection->setAccessible(true);
        return $reflection->getValue($instance);
    }
}
