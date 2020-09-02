<?php

namespace Wranx\Database;

use PDO;
use PDOException;
use Wranx\Contracts\Repositories\ConnectionInterface;

/**
 * Class Connection
 * @package Wranx\Repositories
 */
abstract class Connection implements ConnectionInterface
{
    /**
     * @var PDO $connection
     */
    public $connection;

    /**
     * @var array $options
     */
    protected $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

    /**
     * @param array $settings
     */
    public function setConnection(array $settings): void
    {
        try {
            $this->connection = new PDO($settings['dns'] ,$settings['username'] ,$settings['password'], $this->options);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }
}