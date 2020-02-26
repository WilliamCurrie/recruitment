<?php

namespace Tests;

use DI\Container;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\DataFixtures\Loader;
use App\DataFixtures\InitialFixtureLoader;

abstract class BaseTestCase extends TestCase
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->container = $GLOBALS['container'];
    }

    protected function createSchema(): void
    {
        /** @var EntityManager $entityManager */
        $entityManager = $this->container->get('DoctrineOrmEntityManager');
        $schemaTool = new SchemaTool($entityManager);
        $classes = $entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool->createSchema($classes);
    }

    protected function dropSchema(): void
    {
        /** @var EntityManager $entityManager */
        $entityManager = $this->container->get('DoctrineOrmEntityManager');
        $schemaTool = new SchemaTool($entityManager);
        $classes = $entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool->dropSchema($classes);

        $entityManager->clear();
    }

    protected function loadDataFixtures(): void
    {
        $loader = new Loader();
        $loader->addFixture(new InitialFixtureLoader());

        $purger = new ORMPurger();
        $executor = new ORMExecutor($this->container->get('DoctrineOrmEntityManager'), $purger);
        $executor->execute($loader->getFixtures());
    }
}
