<?php
namespace Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;

class DoctrineORM
{
  protected $em = null;
  protected $config = null;

  public function __construct($serviceManager)
  {
    $conf = new Configuration;
    $cache = 'array';
    $cache = new $cache();
    $conf->setMetadataCacheImpl($cache);
    $driverImpl = $conf->newDefaultAnnotationDriver(['lib/User','lib/Bank','lib/Media','lib/UserPanel'],false);
    $conf->setMetadataDriverImpl($driverImpl);
    $conf->setQueryCacheImpl($cache);
    $conf->setProxyDir('data/DoctrineORMModule/Proxy');
    $conf->setProxyNamespace('DoctrineORMModule\Proxy');
    $conf->setAutoGenerateProxyClasses(true);
    $this->setEntityManager(EntityManager::create([
      'driver'    => 'pdo_mysql',
      'user'      => 'testuser',
      'password'  => 'password',
      'dbname'    => 'test',
      'host'      => 'localhost',
      'port'      => 3306
    ],
      $conf));
  }

  public function setEntityManager(EntityManager $em )
  {
    $this->em = $em;
    return $this;
  }

  public function getEntityManager()
  {
    return $this->em;
  }

  public function setConfig($config = null)
  {
    $this->config = $config;
  }

  public function getConfig()
  {
    return $this->config;
  }
}