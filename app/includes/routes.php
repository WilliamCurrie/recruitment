<?php

use App\Controllers;

// get route
$route = filter_input(INPUT_GET, 'r', FILTER_SANITIZE_STRING);
$components = explode('/', trim($route, '/'));

// customer list
if ($components[0] === 'customers') {
    $controller = 'CustomerList';
}

// customer form
if ($route === '/add/customer' || ($components[0] === 'edit' && $components[1] === 'customer' && count($components) === 3)) {
    $controller = 'CustomerForm';
}

// home redirect
if ($route === '/') {header('Location: /customers');exit;}

// 404
if (!isset($controller)) {header('HTTP/1.0 404 Not Found');exit;}

// set view
$controller = '\App\Controllers\\' . $controller;
$return = new $controller($components);
return $return->setView();
