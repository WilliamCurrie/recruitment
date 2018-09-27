<?php

namespace App\Library;

class App {

    private $controller = 'booking';
    private $method     = 'index';

    /**
     * App constructor.
     */
    public function __construct() {
        $this->makeController();
    }

    /**
     *
     */
    private function makeController(){

        $this->controller = ucfirst($this->controller).'Controller';
        require_once 'app/Controllers/BookingController.php';
        $this->controller = new $this->controller;

        call_user_func_array([$this->controller, $this->method], ['customerID' => '5']);

    }
}