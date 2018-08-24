<?php

namespace Wranx\Application\Http;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Wranx\Framework\Routing\Router;
use Zend\Stratigility\MiddlewarePipe;

class HttpServer
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $pipe = new MiddlewarePipe();

        $pipe->raiseThrowables();

        return $pipe->process($request, $this->container->get(Router::class));
    }
}
