<?php

namespace Wranx\Application\Http\Api\Routing;

use FastRoute\RouteCollector;
use Wranx\Application\Http\Api\Controller\DataController;
use Wranx\Framework\Routing\RouteMapper as Mapper;

class RouteMapper implements Mapper
{
    /**
     * @inheritdoc
     */
    public function map(RouteCollector $router)
    {
        $router->get('/api/data', DataController::class);
    }
}