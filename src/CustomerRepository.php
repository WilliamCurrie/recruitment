<?php

namespace RecruitJordi;

class CustomerRepository extends AbstractRepository
{
    public function __construct($db)
    {
        parent::__construct($db);

        $this->table = 'customers';
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = $id";

        return $this->db->query($sql)->fetch_assoc();
    }
}
