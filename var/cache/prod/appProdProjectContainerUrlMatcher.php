<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request;
        $requestMethod = $canonicalMethod = $context->getMethod();
        $scheme = $context->getScheme();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }


        // homepage
        if ('' === $trimmedPathinfo) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/customer')) {
            // customer_list
            if ('/customer/list' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\CustomerController::findAllAction',  '_route' => 'customer_list',);
            }

            // customer_second_name
            if ('/customer/secondname' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\CustomerController::findBySecondNameAction',  '_route' => 'customer_second_name',);
            }

            // customer_new
            if (0 === strpos($pathinfo, '/customer/new') && preg_match('#^/customer/new/(?P<firstName>[^/]++)/(?P<secondName>[^/]++)/(?P<address>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'customer_new')), array (  '_controller' => 'AppBundle\\Controller\\CustomerController::newAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
