<?php

namespace WrRecruitment\Model;

use WrRecruitment\Core\Database;

abstract class Model {

	protected $db;

	public function __construct() {
		$this->db = new Database();
	}
}