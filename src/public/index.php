<?php

$container = require __DIR__ . '/../bootstrap.php';

$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();

$response = $container->get(\Wranx\Framework\Routing\Router::class)->process($request);

$container->get(\Zend\Diactoros\Response\SapiEmitter::class)->emit($response);

