<?php

/**
 * Class Instance
 */
protected static $_instance = null;

class Booking {

	function __construct(){
		require_once dirname(__FILE__) . 'src/helpers/db-helpers.php';
	}

	static function getAllBookings($id = false)
	{
		$sql = "SELCT * FROM bookings";
		if ($id !== false ) {
			$sql .= " WHERE customerID=" . $id;
		}

		$db = DBHelpers::getDbConnection();

		// Check if we've successfully connected to the database;
		if (isset($db['error'])) {
			// Could not connect to the database
			exit('A database error has occurred');
		}

		$res = $db->query($sql);
		$return = array();

		while ($result = $res->fetch_assoc()){
			$user = Customer::findOneById($result['customerID']);

			$return[$result['id']]['customer_name'] = $user['first_name'] . ' ' .  $user['second_name'];
			$return[$result['id']]['booking_reference'] = $result['booking_reference'];
			$return[$result['id']]['booking_date'] = date('D dS M Y', result['booking_date']);
		}

		return $return;
	}

	/**
	 * Main booking instance
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
