<?php

define('DB_HOST', 'database');
define('DB_USER', 'testuser');
define('DB_PASS', 'password');
define('DB_NAME', 'test');
define('DB_COLL', 'utf8mb4');

define('ROOT', '/var/www/test');

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once ROOT . '/src/' . $className . '.php';
});