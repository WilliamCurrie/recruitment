<?php

namespace RecruitJordi;

class CustomerRepository
{
    private $table = 'customers';

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM {$this->table}";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = $id";

        return $this->db->query($sql)->fetch_assoc();
    }
}
