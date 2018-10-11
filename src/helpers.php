<?php

use Jenssegers\Blade\Blade;

if(!function_exists('view')){
    function view($path, $data = []){
        $blade = new Blade('../views', '../storage/cache');
        echo $blade->make($path, $data);
    }
}

if(!function_exists('request')){
    function request($variable){
        return isset($_REQUEST[$variable]) ? $_REQUEST[$variable] : false;
    }
}

if(!function_exists('redirect')){
    function redirect($url){
        header('Location: '.$url);
        return;
    }
}