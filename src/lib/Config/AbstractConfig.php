<?php
namespace Config;

use Zend\Config\Reader\ReaderInterface;

/**
 * Class AbstractConfig
 * @package Config
 */
abstract class AbstractConfig
{
  /**
   * @var array
   */
    protected $config = array();

  /**
   * @var \Zend\Config\Reader\Yaml
   */
    protected $handler;

  /**
   * @var null|\Zend\Config\Reader\ReaderInterface|\Zend\Config\Reader\Yaml
   */
    protected $default = null;

  /**
   * @var string File
   */
    protected $file;

  /**
   * @var null|string
   */
    protected $fullPath = null;

  /**
   * AbstractConfig constructor.
   * @param \Zend\Config\Reader\ReaderInterface|NULL $handler
   * @param null $file
   */
    public function __construct( ReaderInterface $handler = null, $file = null)
    {
        if(!$handler)
            $handler = new \Zend\Config\Reader\Yaml();

        $this->default = $handler;

        $this->fullPath = substr(__DIR__,0,strrpos(__DIR__, '/')-3).'config/';

        if($file)
            $this->setFile($file);
    }

  /**
   * @param null $key
   * @return array|mixed
   */
    public function getConfig($key = null)
    {
        $collection = ($key)?$this->config[$key]:$this->config;
        return $collection;
    }

  /**
   * @param array $config
   * @return $this
   */
    public function setConfig(Array $config)
    {
        $this->config = $config;

        return $this;
    }

  /**
   * @param array $config
   * @return \Config\AbstractConfig
   */
    public function addConfig(Array $config):self
    {
        foreach($config as $key => $value)
        {
            $this->config[$key] = $value;
        }

        return $this;
    }

  /**
   * @param null $storageHandler
   * @return \Config\AbstractConfig
   */
    public function setStorageHandler( $storageHandler = null):self
    {
        if($storageHandler instanceof ReaderInterface)
        {
            $this->handler = $storageHandler;
        }

        if(!$storageHandler)
            $this->handler = $this->default;

        /**
         * @TODO Add Storage Handler Registration From String
         */
        return $this;
    }

  /**
   * @return \Zend\Config\Reader\Yaml
   */
    public function getStorageHandler()
    {
        return $this->handler;
    }

  /**
   * @param $file
   * @return \Config\AbstractConfig
   */
    public function setFile( $file ):self
    {
        $this->file = $this->fullPath.$file;

        return $this;
    }

  /**
   * @return string File
   */
    public function getFile()
    {
        return $this->file;
    }

  /**
   * @param null $name
   * @return mixed
   * @throws \Exception
   */
    public function getKey( $name = null )
    {
        if($name)
            return $this->getConfig()[$name];

        throw new \Exception('Config key name isnull -> key required');
    }

  /**
   * @return array|mixed
   */
    public function getData()
    {
        if(!$this->getConfig())
            $this->setConfig($this->getStorageHandler()->fromFile($this->getFile()));


        return $this->getConfig();
    }

  /**
   * @return \Config\AbstractConfig
   */
    public function readData():self
    {
        $this->setConfig($this->getStorageHandler()->fromFile($this->getFile()));

        return $this;
    }
}