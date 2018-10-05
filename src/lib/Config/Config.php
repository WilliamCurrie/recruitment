<?php
namespace Config;


/**
 * Class Config
 * @package Config
 */
class Config extends AbstractConfig
{
  /**
   * Config constructor.
   */
    public function __construct()
    {
        parent::__construct(null, 'config.yaml');

        return $this;
    }


    public function loadConfigs()
    {
        $configs = $this->getData();

        foreach( $configs['configs'] as $name => $file)
        {
            $class = "\\Config\\{$name}";
            $this->addConfig(array($name => new $class(null,$file)));
            $this->getKey($name)->setStorageHandler()->readData();
        }
    }

  /**
   * @return \Config\Config
   */
    public function registerConfigs():self
    {
      $this->loadConfigs();

      return $this;
    }
} 