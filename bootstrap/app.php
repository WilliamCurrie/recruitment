<?php

/**
 * Dotenv - for parsing .env files and loading its values into the environment
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

/**
 * DI Container - Defines how dependencies are injected/resolved into various classes.
 * The definitions file contains the configuration of Twig and Doctrine and adds them
 * to the container.
 */
$builder = new DI\ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/../config/di/definitions.php');

return $builder->build();