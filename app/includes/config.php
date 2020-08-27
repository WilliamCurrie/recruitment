<?php

// composer
require '../vendor/autoload.php';

// dotenv
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

// app settings
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_NAME', $_ENV['DB_NAME']);
