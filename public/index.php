<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();
$router->map('GET|POST', '/', 'home@index', 'home');
$router->map('GET', '/bookings/[i:id]', 'Booking@index', 'show_bookings');
$router->map('GET', '/users/[i:id]', 'users#show', 'users_show');
$router->map('POST', '/users/[i:id]/[delete|update:action]', 'usersController#doAction', 'users_do');

// match current request
$match = $router->match();

if( is_array($match) ) {
	$target = explode('@', $match['target']);
	$controllerres = 'WrRecruitment\\Controller\\'.ucwords($target[0]).'Controller';
	$controller = new $controllerres;


	if($target[0] !== NULL) {
	    $func = $target[1];
	    if($match['params']){
		    $controller->$func($match['params']);
        } else {
		    $controller->$func();
	    }
	}

} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

