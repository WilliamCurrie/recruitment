<?php
namespace Response;

use Zend\Http\PhpEnvironment\Response as HttpResponse;
use Renderer\Renderer;

/**
 * Class Response
 * @package Response
 */
class Response
{
  /**
   * @var HttpResponse
   */
    protected $_handler;

  /**
   * @var \Renderer\Renderer
   */
    protected $_renderer;

  /**
   * Response constructor.
   * @param \recruitmentLoader $application
   */
    public function __construct( \recruitmentLoader $application )
    {
        $this->_renderer = new Renderer($application);
        $this->setHandler();
    }

  /**
   * @param null $handler
   * @return \Response\Response
   */
    public function setHandler( $handler = null ):self
    {
        $this->_handler = ($handler)?$handler:new HttpResponse();
        return $this;
    }

  /**
   * @return \Zend\Http\PhpEnvironment\Response
   */
    public function getHandler()
    {
        return $this->_handler;
    }

  /**
   * @param $model
   * @return string
   */
    public function render($model)
    {
        return $this->_renderer->getHandler()->render($model);
    }
} 