<?php

class Customer
{
	private $title;
	private $firstName;
	private $lastName;
	private $address;

	protected static $_instance = null;

	private function __construct( $title, $firstName, $lastName, $address ) {
		require_once dirname(__FILE__) . 'src/helpers/db-helpers.php';

		self::$title = $title;
		self::$firstName = $firstName;
		self::$lastName = $lastName;
		self::$address = $address;

		// Save the customer to the database
		$this->saveCustomer();
	}

	/**
	 * Save the customer to the database
	 */
	function saveCustomer(){
		$db = DBHelpers::getDbConnection();

		// Check if we've successfully connected to the database;
		if (isset($db['error'])) {
			// Could not connect to the database
			exit('A database error has occurred');
		}

		$result = $db->query('INSERT INTO customers (first_name, second_name) VALUES (\''.self::$firstName.'\', \''self::$lastName.'\', \''.self::$address.'\')');

		return $result;
	}

	/**
	 * Find all customers and order them by Last Name
	 *
	 * return @array
	 */
	function findAllByLastName(){
		$db = DBHelpers::getDbConnection();

		// Check if we've successfully connected to the database;
		if (isset($db['error'])) {
			// Could not connect to the database
			exit('A database error has occurred');
		}

		$res = $db->query('SELECT * FROM customers ORDER BY second_name');

		while($result = $res->fetch_assoc()){
			echo($this->formatNames($result['first_name'], $result['second_name']));
		}

		return $res->fetch_assoc();
	}

	private function formatNames( $firstName, $lastName ) {
		$full_name = $firstName .= ' ';
		$full_name .= $lastName;

		return $full_name;
	}

	function findOneById( string $id )
	{
		$db = DBHelpers::getDbConnection();

		// Check if we've successfully connected to the database;
		if (isset($db['error'])) {
			// Could not connect to the database
			exit('A database error has occurred');
		}

		$res = $db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');

		mysqli_close ($db);

		return $res;
	}

	/**
	 * Get all the customers from the database and output them
	 */
	function getAllCustomers(){
		$db = DBHelpers::getDbConnection();

		// Check if we've successfully connected to the database;
		if (isset($db['error'])) {
			// Could not connect to the database
			exit('A database error has occurred');
		}

		$res = $db->query('SELECT * FROM customers');

		print '<table>';
		while ($result = $res->fetch_assoc()){
			echo '<tr>';
			echo '<td>'.$result['first_name'].'</ td>';
			echo '<td>'.$result['second_name'].'</ TD>';
			echo '</tr>';
		}

		echo('</table>');

		return $res->fetch_assoc();
	}

	static function getFirstName(){
		return self::$firstName;
	}

	static function getLastName(){
		return self::$lastName;
	}

	static function
	/**
	 * Main customer instance
	 *
	 * @return Booking
	 */
	public static function instance($title, $firstName, $lastName, $address) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self($title, $firstName, $lastName, $address);
		}
		return self::$_instance;
	}
}