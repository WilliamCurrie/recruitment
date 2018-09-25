<?php

namespace RecruitJordi;

class AbstractRepository
{
    protected $db;

    protected $table;

	public function __construct(Db $db)
	{
		$this->db = $db;
	}

	public function fetchAll(): array
	{
		$sql = "SELECT * FROM {$this->table}";

		return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
	}
}
