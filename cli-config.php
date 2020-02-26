<?php

$container = require_once 'bootstrap/app.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    $container->get('DoctrineOrmEntityManager')
);
