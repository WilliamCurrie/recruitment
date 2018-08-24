<?php

namespace Wranx\Application\Http\App\Routing;

use FastRoute\RouteCollector;
use Wranx\Application\Http\App\Controller\HomepageController;
use Wranx\Framework\Routing\RouteMapper as Mapper;

class RouteMapper implements Mapper
{
    /**
     * @inheritdoc
     */
    public function map(RouteCollector $router)
    {
        $router->get('/', HomepageController::class);
    }
}
