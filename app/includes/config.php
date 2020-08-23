<?php

include('../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

// Database Settings from .env file
define('DB_HOST', $_ENV['MYSQL_HOST'] ?: 'database');
define('DB_USER', $_ENV['MYSQL_USER'] ?: 'testuser');
define('DB_NAME', $_ENV['MYSQL_DATABASE'] ?: 'test');
define('DB_PASS', $_ENV['MYSQL_PASSWORD'] ?: 'password');
define('DB_PREFIX', '');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATION', 'utf8mb4_unicode_ci');

// External Paths
define('URL_PATH', 'https://localhost/');

define('PUBLIC_PATH', 'public');
define('THEME_PATH', 'theme');
