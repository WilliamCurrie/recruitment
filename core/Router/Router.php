<?php

namespace Core\Router;

use App\Controller\CustomerController;

class Router
{
    /**
     * @param string $controller
     * @param string $action
     * @param array  $params
     *
     * @return mixed
     */
    public static function dispatch(string $controller, string $action, array $params)
    {
        $controllerName = '\\App\\Controller\\' . $controller . 'Controller';
        $actionName = $action . 'Action';

        /** @var CustomerController $controller */
        $controller = new $controllerName;


        return call_user_func_array([$controller, $actionName], $params);
    }
}