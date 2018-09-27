<?php

namespace RecruitJordi;

class AbstractEntity
{
    protected $db;

	public function __construct(Db $db)
	{
		$this->db = $db;
	}
}
