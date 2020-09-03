<?php

namespace Application\Adaptor\Database;

use mysqli;
use mysqli_result;

/**
 * NB: this is a crude wrapper to provide a DB connection to other classes in the absence of a framework methodology.
 *
 * Class MysqlAdapter
 *
 * @package Application\Adaptor\Database
 */
class MysqlAdapter extends AbstractAdapter
{
    /** @var mysqli $db */
    protected $db;

    /**
     * MysqlAdapter constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        /**
         * NB: I will be setting an empty config array for unit test, however normally I would use the Service Manager
         * to override the adapter with a mock adapter for testing.
         */
        if (!empty($config)) {
            $this->db = new mysqli((string)$config["dbHost"], $config["dbUser"], $config["dbPassword"], $config["dbName"]);
        }
    }

    /**
     * NB: this is a very crude wrapper.
     * Normally a Select query would be built and parsed as PDO statement for execution
     *
     * @param  string $sql
     *
     * @return bool|mysqli_result
     */
    public function query(string $sql)
    {
        return $this->db->query($sql);
    }

    /**
     * NB: basic wrapper to sanitise data. Much better to use Input Filters, Validation and request constraints.
     *
     * @param  string $string
     * @return string
     */
    public function escapeString(string $string)
    {
        return mysqli_escape_string($this->db, $string);
    }
}
