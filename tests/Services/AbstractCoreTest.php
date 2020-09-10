<?php

namespace Mfisher\Tests\Services;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;
use PHPUnit\Framework\TestCase;

abstract class AbstractCoreTest extends TestCase
{
     /** @var string */
     protected const CUSTOMER_SQL_FIXTURE = 'customer.sql';

     /** @var string */
     protected const BOOKING_SQL_FIXTURE = 'booking.sql';

     /** @var EntityManager */
     protected $entityManager;
 
     /**
      * Setup for tests
      */
     protected function setUp(): void
     {
         $this->entityManager = $this->setUpSchema();
     }
 
     /**
      * Setup sqlite entity manager
      *
      * @return EntityManager
      */
     private function setUpSchema(): EntityManager
     {
         $paths = [__DIR__ . '/../../src/Entities/'];
         $isDevMode = true;
 
         // the connection configuration
         $dbParams = array(
             'driver'  => 'pdo_sqlite',
             'memory'  => true,
             'charset' => 'UTF8'
         );
 
         $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
         $entityManager = EntityManager::create($dbParams, $config);
         
         $metaData = $entityManager->getMetadataFactory()->getAllMetadata();
         $schemaTool = new SchemaTool($entityManager);
         $schemaTool->updateSchema($metaData);
 
         return $entityManager;
     } 
}