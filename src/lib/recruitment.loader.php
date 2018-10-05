<?php

use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver;
use Zend\View\Model\ViewModel;

/**
 * Class recruitmentLoader
 */
class recruitmentLoader
{

  /**
   * @var \Config\Config
   */
    protected $_config;

    /**
   * @var \Request\Request
   */
    protected $_request;

  /**
   * @var \Response\Response
   */
    protected $_response;

  /**
   * recruitmentLoader constructor.
   */
    public function __construct()
    {
      $this->registerLoader();
      $this->registerConfig();
      $this->setRequestManager();
      $this->setResponseManager();
      $this->init();
    }


  /**
   * @return \recruitmentLoader
   */
    public function init():self
    {
      $controller = new \Main\Controller\IndexController($this);
      $this->getResponseManager()->getHandler()->setContent($this->getResponseManager()->render($controller->indexAction()))->send();

      return $this;
    }

  /**
   * @return \recruitmentLoader
   */
    public function registerConfig():self
    {
        $this->setConfig(new Config\Config());
        $this->getConfig()->setStorageHandler()->registerConfigs();

      return $this;
    }

  /**
   * @param \Config\Config|NULL $config
   * @return \recruitmentLoader
   */
    public function setConfig(\Config\Config $config = null):self
    {
        if($config)
        {
            $this->_config = $config;
            return $this;
        }

        $this->_config = new Config\Config();
        $this->getConfig()->setStorageHandler()->registerConfigs();
        return $this;
    }

  /**
   * @return \Config\Config
   */
    public function getConfig():\Config\Config
    {
        return $this->_config;
    }

  /**
   * @param \Request\Request|NULL $request
   * @return \recruitmentLoader
   */
    public function setRequestManager(\Request\Request $request = null):self
    {
        $this->_request = ($request)?$request:new \Request\Request($this);
        return $this;
    }

  /**
   * @return \Request\Request
   */
    public function getRequestManager():\Request\Request
    {
        return $this->_request;
    }

  /**
   * @param \Response\Response|NULL $response
   * @return \recruitmentLoader
   */
    public function setResponseManager(\Response\Response $response = null ):self
    {
        $this->_response = ($response)?$response:new \Response\Response($this);
        return $this;
    }

  /**
   * @return \Response\Response
   */
    public function getResponseManager():\Response\Response
    {
        return $this->_response;
    }


    public function registerLoader()
    {
        $fullPath = substr(__DIR__,0,strrpos(__DIR__, '/')+1);
        $this->fullPath = $fullPath;

          spl_autoload_register( function ($className)
          {
              $fullPath = substr(__DIR__,0,strrpos(__DIR__, '/')+1);

              $className = ltrim($className, '\\');
              $fileName  = 'lib/';
              $namespace = '';
              if ($lastNsPos = strrpos($className, '\\')) {
                  $namespace = substr($className, 0, $lastNsPos);

                  $className = substr($className, $lastNsPos + 1);
                  $namespace = explode("\\", $namespace);
                  $fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace[0].DIRECTORY_SEPARATOR);
              }
              $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
              require $fullPath.$fileName;
          });

        if (file_exists("{$fullPath}vendor/autoload.php")) {
          $loader = include "{$fullPath}vendor/autoload.php";
        }
    }

}