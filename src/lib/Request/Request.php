<?php
namespace Request;

use Zend\Http\PhpEnvironment\Request as HttpRequest;

/**
 * Class Request
 * @package Request
 */
class Request
{
  /**
   * @var \recruitmentLoader
   */
    protected $_application;

  /**
   * @var HttpRequest
   */
    protected $_handler;

  /**
   * Request constructor.
   * @param \recruitmentLoader $application
   */
    public function __construct(\recruitmentLoader $application )
    {
        $this->_application = $application;
        $this->setHandler();
    }

  /**
   * @param null $handler
   * @return $this
   */
    public function setHandler( $handler = null )
    {
        $this->_handler = ($handler)?$handler:new HttpRequest();
        return $this;
    }

    public function getHandler()
    {
        return $this->_handler;
    }


    public function parseRequest()
    {
        $method = $this->getHandler()->getMethod();
        $this->$method();
    }

    private function get()
    {
      /**
       * @TODO Get Logic
       */
    }

    private function post()
    {
        /**
         * @TODO Post Logic
         */
    }
} 