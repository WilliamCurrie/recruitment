<?php
namespace Config;

/**
 * Class DoctrineORM
 * @package Config
 */
class DoctrineORM extends AbstractConfig
{
  /**
   * @return \Config\DoctrineORM
   */
    public function readData():self
    {
        $config = $this->getStorageHandler()->fromFile($this->getFile());

        foreach($config['config']['paths'] as $key => $value)
        {
            $config['config']['paths'][$key] = __DIR__.$value;
        }

        $this->setConfig($config);

        return $this;
    }
}