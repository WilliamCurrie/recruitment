<?php

$config = Doctrine\ORM\Tools\Setup::createXMLMetadataConfiguration(
    [__DIR__ . '/../config/orm/xml'],
    getenv('DEV_MODE')
);

if (getenv('APP_ENV') == 'testing') {
    $connection = [
        'driver' => 'pdo_sqlite',
        'memory' => true,
    ];
} else {
    $connection = [
        'driver' => 'pdo_mysql',
        'dbname' => getenv('DB_DATABASE'),
        'user' => getenv('DB_USER'),
        'password' => getenv('DB_PASSWORD'),
        'host' => getenv('DB_HOST')
    ];
}

return Doctrine\ORM\EntityManager::create($connection, $config);