<?php

use App\DataFixtures\InitialFixtureLoader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

require_once __DIR__ . '/vendor/autoload.php';
$container = require_once __DIR__ . '/bootstrap/app.php';

$loader = new Loader();
$loader->addFixture(new InitialFixtureLoader());

$purger = new ORMPurger();
$executor = new ORMExecutor($container->get('DoctrineOrmEntityManager'), $purger);
$executor->execute($loader->getFixtures());
