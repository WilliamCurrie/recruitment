<?php

class DBHelpers {
	protected static $_instance = null;

	function __construct() {
		require_once dirname(__FILE__ ) . 'config.php';
	}

	static function getDbConnection() {
		$db = new \mysqli('127.0.0.1', 'testuser', 'password', 'test', DB_PORT);

		/* check connection */
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			return array(
				'error'  =>  true,
				'message'  =>   'Could not connect to the database');
		}

		return $db;
	}

	/**
	 * Main db helpers instance
	 *
	 * @return Booking
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}