<?php
namespace Renderer;

use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver;

/**
 * Class Renderer
 * @package Renderer
 */
class Renderer
{
  /**
   * @var PhpRenderer
   */
    protected $_handler;

  /**
   * @var \recruitmentLoader
   */
    protected $_application;

  /**
   * @var \Zend\View\Resolver\AggregateResolver
   */
    protected $_resolver;

  /**
   * Renderer constructor.
   * @param \recruitmentLoader $application
   */
    public function __construct( \recruitmentLoader $application )
    {
        $this->_application = $application;
        $this->_resolver = new Resolver\AggregateResolver();
        $this->_resolver
            ->attach(new Resolver\TemplateMapResolver($this->_application->getConfig()->getKey('Local')->getConfig('view_manager')['template_map']))
            ->attach(new Resolver\TemplatePathStack([$this->_application->getConfig()->getKey('Local')->getConfig('view_manager')['stack']]));

        $this->setHandler();

    }

  /**
   * @param null $handler
   * @return \Renderer\Renderer
   */
    public function setHandler( $handler = null ):self
    {
        $this->_handler = ($handler)?$handler:new PhpRenderer();
        $this->_handler->setResolver($this->_resolver);
        return $this;
    }

  /**
   * @return \Zend\View\Renderer\PhpRenderer
   */
    public function getHandler()
    {
        return $this->_handler;
    }
}