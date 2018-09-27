<?php

namespace RecruitJordi\Repository;

use RecruitJordi\AbstractRepository;
use RecruitJordi\Db;

class Customer extends AbstractRepository
{
    public function __construct(Db $db)
    {
        parent::__construct($db);

        $this->table = 'customers';
    }

    public function fetchById(int $id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = $id";

        return $this->db->query($sql)->fetch_assoc();
    }
}
