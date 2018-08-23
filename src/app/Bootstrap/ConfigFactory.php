<?php

namespace Wranx\Bootstrap;

class ConfigFactory
{
    /**
     * @return Config
     */
    public static function create(): Config
    {
        return new Config([
            'database' => [
                'default' => [
                    'pdo' => [
                        'dsn' => getenv('DB_DSN') ?: 'mysql:host=database;dbname=test',
                        'user' => getenv('DB_USER') ?: 'root',
                        'password' => getenv('DB_PASSWORD') ?: 'password'
                    ]
                ]
            ],
        ]);
    }
}
