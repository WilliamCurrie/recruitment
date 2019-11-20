<?php
/**
 * Created by PhpStorm.
 * User: Rich
 * Date: 16/11/2019
 * Time: 22:11
 */

namespace WilliamCurrie\Recruitment;

use PDO;

class Config
{
    /** const array Database connection details */
    private const DB_CONFIG = [
        'username' => 'testuser',
        'password' => 'password',
        'host' => 'database',
        'default_db' => 'test',
        'port' => 3306,
        'pdo_options' => [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    ];

    /** const string Path to template root */
    private const TEMPLATE_DIR = __DIR__ . '/../templates';

    /**
     * @return string PDO DSN string
     */
    public function getDsn(): string
    {
        return "mysql:host="
            . self::DB_CONFIG['host']
            . ';dbname='
            . self::DB_CONFIG['default_db']
            . ';port='
            . self::DB_CONFIG['port'];
    }

    /**
     * @return string Database username
     */
    public function getDbUsername(): string
    {
        return self::DB_CONFIG['username'];
    }

    /**
     * @return string Database password
     */
    public function getDbPassword(): string
    {
        return self::DB_CONFIG['password'];
    }

    /**
     * @return array PDO options
     */
    public function getPdoOptions(): array
    {
        return self::DB_CONFIG['pdo_options'];
    }

    /**
     * @return string Path to twig template root
     */
    public function getTemplateDir(): string
    {
        return self::TEMPLATE_DIR;
    }
}
