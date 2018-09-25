<?php

namespace RecruitJordi;

class AbstractRepository
{
    protected $db;

    protected $table;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function fetchAll()
	{
		$sql = "SELECT * FROM {$this->table}";

		return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
	}
}
