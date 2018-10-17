<?php

namespace Start;

use App\Controller\PageController;
use App\Controller\CustomerController;

class Routes
{
    public static $collection = [
        '/' => [
            'verb' => 'GET',
            'controller' => PageController::class,
            'method' => 'handleGet',
        ],
        '/customer/create' => [
            'verb' => 'GET',
            'controller' => CustomerController::class,
            'method' => 'handleGet',
        ],
        '/customer/store' => [
            'verb' => 'POST',
            'controller' => CustomerController::class,
            'method' => 'handlePost',
        ],
    ];
}
