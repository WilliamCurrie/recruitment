<?php

namespace RecruitJordi;

/**
 * Db class.
 */
class Db
{
    /**
     * Reference to the MySql instance.
     *
     * @var MySql
     */
    private static $instance;

    /**
     * Db handler.
     *
     * @var mysqli
     */
    private $mysqli;

    /**
     * Returns the current instance.
     *
     * @return Singleton
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Constructor.
     */
    protected function __construct()
    {
        $this->mysqli = new \MySQLI(
            getenv('DB_HOST'),
            getenv('DB_USER'),
            getenv('DB_PASSWORD'),
            getenv('DB_NAME'),
            getenv('DB_PORT')
        );

        $this->mysqli->set_charset('utf8');
    }

    /**
     * Prevents from cloning.
     */
    private function __clone()
    {
    }

    /**
     * Prevents from unserializing.
     */
    private function __wakeup()
    {
    }

    /**
     * Queries the database.
     *
     * @param string
     * @return false|mysqli_result
     */
    public function query(string $sql)
    {
        return $this->mysqli->query($sql);
    }

    /**
     * Escapes the data to prevent sql injections.
     *
     * @param string
     * @return string
     */
    public function escape(string $data): string
    {
        return $this->mysqli->real_escape_string($data);
    }
}
