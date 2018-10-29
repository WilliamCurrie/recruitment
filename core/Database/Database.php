<?php

namespace Core\Database;

use Core\Configuration\Configuration;
use Core\Error\MissingDbConnectionCredentialException;

/**
 * Class Database
 *
 * @package Core\Database
 */
class Database
{
    /** @var \PDO */
    private $connection;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $host;

    /** @var string */
    private $port;

    /** @var string */
    private $name;

    /**
     * Database constructor.
     *
     * @param Configuration $configuration
     *
     * @throws MissingDbConnectionCredentialException
     */
    public function __construct(Configuration $configuration)
    {
        $dbConfig = $configuration->getDbConfig();

        try {
            $this->username = $dbConfig['username'];
            $this->password = $dbConfig['password'];
            $this->host = $dbConfig['host'];
            $this->port = $dbConfig['port'];
            $this->name = $dbConfig['database'];

        } catch(\Exception $e) {
            throw new MissingDbConnectionCredentialException();
        }
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        if (!$this->connection) {
            $this->establishConnection();
        }

        return $this->connection;
    }

    /**
     *
     */
    private function establishConnection()
    {
        $dsn = sprintf('mysql:dbname=%s;host=%s', $this->name, $this->host);
        try {
            $this->connection = new \PDO($dsn, $this->username, $this->password);
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
}