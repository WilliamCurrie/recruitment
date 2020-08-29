<?php

use Wranx\App\Application;
use Wranx\Application\Repositories\{BookingRepository, CustomerRepository};
use Wranx\Application\Contracts\Repositories\BookingRepositoryInterface;
use Wranx\Application\Contracts\Repositories\CustomerRepositoryInterface;
use Wranx\Config\Config;
use Wranx\Contracts\Config\ConfigInterface;
use Wranx\Contracts\Database\SQLQueryBuilder;
use Wranx\Contracts\Manager\ManagerInterface;
use Wranx\Contracts\Support\Collection;
use Wranx\Database\MysqlQueryBuilder;
use Wranx\Manager\DbManager;
use Wranx\Support\WranxCollection;

$app = new Application;
$app->singleton(Collection::class, WranxCollection::class);
$app->singleton(SQLQueryBuilder::class, MysqlQueryBuilder::class);
$app->singleton(ConfigInterface::class, Config::class);
$app->singleton(ManagerInterface::class, static function () use($app) {
    $collection = $app->make(Collection::class);
    $builder    = $app->make(SQLQueryBuilder::class, [$collection]);
    $config     = $app->make(ConfigInterface::class);
    $manager    = new DbManager;
    return $manager
            ->setConfig($config)
            ->setBuilder($builder)
            ->connect();
});
$app->singleton(BookingRepositoryInterface::class, BookingRepository::class);
$app->singleton(CustomerRepositoryInterface::class, CustomerRepository::class);
return $app;