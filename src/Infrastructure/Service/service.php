<?php
$app->register(
    new Silex\Provider\DoctrineServiceProvider(),
    [
        'db.options' => [
            'host'     => getenv('DB_HOST'),
            'port'     => getenv('DB_PORT'),
            'user'     => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'dbname'   => getenv('DB_NAME'),
            'driver'   => getenv('DB_DRIVER'),
        ]
    ]
);
$app->register(
    new \Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider(),
    [
        'orm.proxies_dir'             => $app['root.dir'] . '/src/Application/Entity/Proxy',
        'orm.auto_generate_proxies'   => $app['debug'],
        'orm.em.options'              => [
            'mappings' => [
                [
                    'type'                         => 'annotation',
                    'namespace'                    => 'App\\Domain\\Entity\\Customer\\',
                    'path'                         => $app['root.dir'] . '/src/Domain/Entity/Customer',
                    'use_simple_annotation_reader' => false,
                ],
                [
                    'type'                         => 'annotation',
                    'namespace'                    => 'App\\Domain\\Entity\\Booking\\',
                    'path'                         => $app['root.dir'] . '/src/Domain/Entity/Booking',
                    'use_simple_annotation_reader' => false,
                ],
            ],
        ]
    ]
);