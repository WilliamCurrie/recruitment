<?php
namespace Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration;

/**
 * Class DoctrineORM
 * @package Manager
 */
class DoctrineORM
{
  /**
   * @var EntityManager
   */
  protected $_em;

  /**
   * @var \Config\DoctrineORM
   */
  protected $_config;

  /**
   * @var \recruitmentLoader
   */
  protected $_application;

  /**
   * DoctrineORM constructor.
   * @param \recruitmentLoader $application
   */
  public function __construct(\recruitmentLoader $application)
  {
    $this->_application = $application;
    $this->setConfig($this->_application->getConfig()->getKey('DoctrineORM')->getKey('doctrine'));
    $conf = new Configuration;
    $cache = $this->getConfig()['configuration']['orm_manager']['metadata_cache'];
    $cache = new $cache();
    $conf->setMetadataCacheImpl($cache);
    $driverImpl = $conf->newDefaultAnnotationDriver($this->getConfig()['configuration']['orm_manager']['paths'],false);
    $conf->setMetadataDriverImpl($driverImpl);
    $conf->setQueryCacheImpl($cache);
    $conf->setProxyDir($this->getConfig()['configuration']['orm_default']['proxy_dir']);
    $conf->setProxyNamespace($this->getConfig()['configuration']['orm_default']['proxy_namespace']);
    $conf->setAutoGenerateProxyClasses($this->getConfig()['configuration']['orm_default']['generate_proxies']);
    $this->setEntityManager(EntityManager::create($this->getConfig()['connection']['orm_default']['params'], $conf));
  }

  /**
   * @param \Doctrine\ORM\EntityManager $em
   * @return \Manager\DoctrineORM
   */
  public function setEntityManager(EntityManager $em ):self
  {
    $this->_em = $em;
    return $this;
  }

  /**
   * @return \Doctrine\ORM\EntityManager
   */
  public function getEntityManager():EntityManager
  {
    return $this->_em;
  }

  /**
   * @param null $config
   * @return \Manager\DoctrineORM
   */
  public function setConfig($config = null):self
  {
    $this->_config = $config;

    return $this;
  }

  /**
   * @return \Config\DoctrineORM
   */
  public function getConfig()
  {
    return $this->_config;
  }
}