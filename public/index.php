<?php

/**
 * NB: whilst I am creating the IndexController manually in this "Front Controller" file, this would normally be
 * handled by the framework bootstrap, configuration and chosen router.
 */

use Application\Factory\Controller\IndexControllerFactory;

// make everything relative for bootstrap
chdir(dirname(__DIR__));

// Composer autoload
include __DIR__ . '/../vendor/autoload.php';

/**
 * NB: get configuration - this would normally be handled by the framework utilities and bootstrap.
 * For example; Zend will merge and cache configuration files from all services and modules for easy reference.
 * For brevity a simple array of values is included.
 * Credentials included from env, but even this would not be in committed config file.
 */
$config = [
    "dbHost" => getenv("MYSQL_HOST"),
    "dbPort" => getenv("MYSQL_PORT"),
    "dbName" => getenv("MYSQL_DATABASE"),
    "dbUser" => getenv("MYSQL_USER"),
    "dbPassword" => getenv("MYSQL_PASSWORD"),
];

/**
 * NB: this would normally be handled by the framework, configuration, service manager, router and not exposed this way
 */
$indexController = (new IndexControllerFactory($config))->getController();

/**
 * NB: this would normally be a returned View / Template but in this instance we've simply included the template file
 */
$indexController->indexAction();
