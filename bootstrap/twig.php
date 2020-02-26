<?php

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'/../views');
return new \Twig\Environment($loader);
