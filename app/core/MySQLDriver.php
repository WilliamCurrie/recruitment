<?php

namespace App\Connection;

/**
 * The database class which creates the database connection
 */
class MySQLDriver implements DatabaseInterface
{
    private $db;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($db->connect_errno) {
            echo 'Failed to connect to MySQL: (' . $db->connect_errno . ') ' . $db->connect_error;
            exit;
        }
        $db->set_charset(DB_CHARSET);
        $db->query('SET collation_connection = '.DB_COLLATION);
        $this->db = $db;
    }

    /**
     * Converts the mysql Result to friendly array
     * @param \mysqli_result $mysqlResult
     * @return array
     */
    private function mysqlResultToArray(\mysqli_result $mysqlResult) : array
    {
        $result = [];
        while ($row = $mysqlResult->fetch_assoc()) {
            array_push($result, $row);
        }
        return $result;
    }

    /**
     * Get all rows from the DB
     * @param string $tableName
     * @return array
     */
    public function getAll(string $tableName)
    {
        $query = $this->db->prepare("SELECT * FROM ${tableName}");
        if ($query) {
            $query->execute();
            $queryResult = $query->get_result();
            return $this->mysqlResultToArray($queryResult);
        }
        return [];
    }

    /**
     * Get Rows from the Database
     * @todo We should add operator support
     * @param string $tableName
     * @param string $fieldName
     * @param string $parameter
     * @return array|object
     */
    public function get(string $tableName, string $fieldName = 'id', string $parameter)
    {
        $query = $this->db->prepare("SELECT * FROM ${tableName} WHERE ${fieldName} = ?");
        if ($query) {
            $query->bind_param('s', $parameter);
            $query->execute();
            $queryResult = $query->get_result();
            return $this->mysqlResultToArray($queryResult);
        }
        return [];
    }

    /**
     * Create new entry in the database
     * @param string $tableName Table Name
     * @param array $values
     * @param string $types Type of the values s: string i: integer
     * @param string $fieldName
     * @return bool
     */
    public function create(string $tableName, array $values, string $types, string $fieldName) :bool
    {
        $params = implode(',', array_fill(0, count($values), '?'));
        $query = $this->db->prepare("INSERT INTO ${tableName} (${fieldName}) VALUES (${params})");
        if ($query) {
            $query->bind_param($types, ...$values);
            $query->execute();
            return true;
        }
        return false;
    }

    /**
     * Class destructor
     */
    public function __destruct()
    {
        mysqli_close($this->db);
    }
}
