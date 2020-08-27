<?php

namespace App\Views;

class View
{
    public $data;
    public $path;
    
    public function render()
    {
        require __DIR__ . '/../public/views/' . $this->path . '.php';
    }
}
