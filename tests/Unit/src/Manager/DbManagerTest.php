<?php

namespace Wranx\Tests\Unit\src\Manager;

use Mockery;
use Mockery\Mock;
use ReflectionException;
use Wranx\Contracts\Config\ConfigInterface as Config;
use Wranx\Contracts\Database\SQLQueryBuilder as Builder;
use Wranx\Manager\DbManager;
use Wranx\Tests\TestCase;

class DbManagerTest extends TestCase
{
    /**
     * @var Mock|Config
     */
    protected $mockConfig;

    /**
     * @var Mock|Builder
     */
    protected $mockBuilder;

    public function setup(): void
    {
        parent::setUp();
        $this->mockConfig      = Mockery::mock(Config::class);
        $this->mockBuilder     = Mockery::mock(Builder::class);
    }

    /**
     * Set the config
     *
     * @test
     * @throws ReflectionException
     */
    public function set_config(): void
    {
        $manager    = new DbManager;
        $response   = $manager->setConfig($this->mockConfig);
        $value = $this->getProperty($manager,'config');
        $this->assertInstanceOf(Config::class, $value);
        $this->assertInstanceOf(DbManager::class, $response);
    }

    /**
     * Set the builder
     *
     * @test
     * @throws ReflectionException
     */
    public function set_builder(): void
    {
        $manager    = new DbManager;
        $response   = $manager->setBuilder($this->mockBuilder);
        $value = $this->getProperty($manager,'builder');
        $this->assertInstanceOf(Builder::class, $value);
        $this->assertInstanceOf(DbManager::class, $response);
    }

    /**
     * Get The Driver
     *
     * @test
     */
    public function driver(): void
    {
        $manager    = new DbManager;
        $response   = $manager->setConfig($this->mockConfig)
                ->setBuilder($this->mockBuilder);

        $this->assertInstanceOf(Builder::class, $manager->driver());
        $this->assertInstanceOf(DbManager::class, $response);
    }
}