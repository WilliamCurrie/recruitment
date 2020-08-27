<?php

namespace App\Controllers;

use App\Views;

class Controller
{
    private $data;
    public $route;
    protected $view;

    public function __construct($route = array())
    {
        $this->route = $route;
    }
    
    public function setView()
    {
        $view = new \App\Views\View;
        $view->data = $this->setData();
        $view->path = $this->view;
        return $view->render();
    }
}
