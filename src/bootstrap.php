<?php

use Wranx\Bootstrap\ContainerFactory;

require __DIR__ . '/vendor/autoload.php';

return (new ContainerFactory())->create(
    \Wranx\Bootstrap\ConfigFactory::create()
);