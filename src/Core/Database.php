<?php

namespace WrRecruitment\Core;

class Database
{

    public $table_name;
    public $error;
    private $connectionParam = [
        'host' => '',
        'port' => '',
        'user' => '',
        'password' => '',
        'dbname' => ''
    ];
    private $db;

    public function __construct()
    {
        $this->connectionParam = get_config()['connection']['params'];
        $this->db = new \mysqli($this->connectionParam['host'], $this->connectionParam['user'], $this->connectionParam['password'], $this->connectionParam['dbname'], $this->connectionParam['port']);

        if (mysqli_connect_errno()) {
            $this->error = printf("Connect failed: %s\n", mysqli_connect_error());
            if (strpos(mysqli_connect_error(), "Unknown database") !== null) {
                die("Error");
            }
            exit();
        }
    }

    public function query($query)
    {
        $result = $this->db->query($query);
        if ($result) {
            return $result;
        } else {
            echo ($this->db->error);
        }
    }

    public function close()
    {
        mysqli_close($this->db);
    }
}
