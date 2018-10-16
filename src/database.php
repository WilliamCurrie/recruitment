<?php
class database
{
    private $db;

    public function __construct($host, $username, $password, $dbname, $port = 3306, $charset = 'utf8')
    {
        $dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO($dsn, $username, $password, $options);
            $this->db = $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getDatabase()
    {
        if($this->db) {
            return $this->db;
        }

        return false;
    }
}