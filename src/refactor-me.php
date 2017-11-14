<?php
define('DB_PORT', 3306);
define('DB_HOST', 'localhost');
define('DB_USER', 'testuser');
define('DB_PASS', 'password');
define('DB_BASE', 'test');
define('DB_CONN', 'mysql:%s;%s;%s');

class Customer
{
	public $id;
	public $firstName;
	public $lastName;
	public $address;
	public $twitter;

	private $conn;

	public function __construct()
	{
		$this->conn = new db();
	}

	/*
	 * Save customer
	 */
	public function saveCustomer($firstName, $lastName, $address, $twitter=null)
	{
		$res = false;

		/* check for user first (people may share names but will save getting the same name in again and again here */
		$sql = 'SELECT * FROM customers WHERE first_name = :first AND second_name = :last';
		$val = [
			'first'   => $firstName,
			'last'    => $lastName,
		];
		$info = $this->conn->getOne( $sql, $val );

		/* check user doesn't exist already */
		if( isset( $info['id'] ) )
		{
			$this->id        = $info['id'];
			$this->firstName = $info['first_name'];
			$this->lastName  = $info['second_name'];
			$this->address   = $info['address'];
			$this->twitter   = $info['twitter_alias'];
		}
		else
		{
			/* insert into database */
			$sql = 'INSERT INTO customers (first_name, second_name, address, twitter_alias) VALUES (:first, :last, :address, :twitter)';
			$val = [
				'first'   => $firstName,
				'last'    => $lastName,
				'address' => $address,
				'twitter' => $twitter,
			];
			$res = $this->conn->exec( $sql, $val );

			$this->id        = $this->conn->lastInsertId();
			$this->firstName = $firstName;
			$this->lastName  = $lastName;
			$this->address   = $address;
			$this->twitter   = $twitter;
		}

		return $res;
	}

	/*
	 * Return a set of users order by last name
	 */
	public function listByLastname()
	{
		//function sortname($a, $b) {
		//	$a = $a['second_name'];
		//	$b = $b['second_name'];
		//	if ($a == $b) return 0;
		//	return ($a < $b) ? -1 : 1;
		//}
		//$data = $this->data;
		//usort( $data, 'sortname' );

		///*
		$sql  = 'SELECT first_name, second_name FROM customers ORDER BY second_name';
		$data = $this->conn->getAll( $sql );
		//*/

		$ret = [];

		$string = '';

		foreach( $data as $result )
		{
			$name    = $this->fullName( $result['first_name'], $result['second_name'] );
			$string .= $name .'<br>';
		}

		echo $string;
	}

	/*
	 * will accept empty inputs
	 */
	public function fullName($firstName=null, $lastName=null)
	{
		if( isset( $firstName ) && isset( $lastName ) ) {
			$first = $firstName;
			$last  = $lastName;
		} else {
			$first = $this->firstName;
			$last  = $this->lastName;
		}

		return $first .' '. $last;
	}

	/*
	 * Get all the customers from the database and output them
	 */
	public function getAllCustomers()
	{
		$sql = 'SELECT id, first_name, second_name FROM customers ORDER BY second_name';
		$set = $this->conn->getAll( $sql );

		$string = '<table border="1">';

		foreach($set as $result)
		{
			$string .= '<tr>';
			$string .= '<td>'.$result['first_name'].'</td>';
			$string .= '<td>'.$result['second_name'].'</td>';
			$string .= '</tr>';

			$ret[] = $result;
		}

		$string .= '</table>';

		echo $string;

		return $ret;
	}

	/* static functions */
	private static $sConn;
	private static $sConnected = false;

	private static function connect()
	{
		if( !Customer::$sConnected )
		{
			Customer::$sConn = new db();
			Customer::$sConnected = true;
		}
	}

	public static function findById( $id )
	{
		if( !empty( $id ) )
		{
			Customer::connect();

			$sql = 'SELECT * FROM customers WHERE id = :id';
			$val = ['id' => $id];
			$res = Customer::$sConn->getOne( $sql, $val );
		}

		return $res;
	}
}




class Booking
{
	private $conn;

	public function __construct()
	{
		$this->conn = new db();
	}

	/* basic fullname function */
	public function showname( $first, $last )
	{
		return $first .' '. $last;
	}

	public function GetBookings( $id=null )
	{
		$ret = [];

		/* use rolled function */
		//$data = $this->lookup( $id );

		if( !empty( $id ) )
		{
			$sql  = 'SELECT * FROM bookings WHERE customerID = :id';
			$val  = ['id' => $id];
			$data = $this->conn->getAll( $sql, $val );

			if( $data )
			{
				foreach( $data as $result )
				{
					$user = Customer::findById( $result['customerID'] );

					if( isset( $user['id'] ) )
					{
						$ret[$result['id']]['customer_name']     = $this->showname($user['first_name'], $user['second_name']);
						$ret[$result['id']]['booking_reference'] = $result['booking_reference'];
						$ret[$result['id']]['booking_date']      = date('D dS M Y', strtotime( $result['booking_date'] ) );
					}
				}
			}
		}

		return $ret;
	}
}


/* database class */
class db
{
	private $conn;

	/* I am more familiar with PDO but can use mysqli if absolutely necessary */
	public function connect()
	{
		if( is_a( $this->conn, 'PDO' ) ) {
			return true;
		} else {
			try {
				$base = DB_BASE;
				$host = DB_HOST;
				$port = DB_PORT;
				$user = DB_USER;
				$pass = DB_PASS;
				$conn = sprintf( DB_CONN, DB_BASE, DB_HOST, DB_PORT );
				$settings = [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, \PDO::ATTR_PERSISTENT => false,];
				$this->conn = new \PDO( $conn, $user, $pass, $settings );
			}
			catch( \PDOException $e )
			{
				$error = $e->getMessage();
				/* log the error etc */
				error_log( 'could not connect to database: '. $error );
			}
		}
	}

	/* fetch one or a set of rows */
	public function getSet( $one=false, $sql, $val=null )
	{
		$ret = false;

		$this->connect();

		$sth = $this->conn->prepare( $sql );

		if( $sth )
		{
			if( $sth->execute( $val ) )
			{
				$ret = ( $one == true ) ? $sth->fetch() : $sth->fetchAll();
			}
			else
			{
				$e = $sth->errorInfo();
				error_log( 'select input value error: ' .$e[0].' '.$e[1].' '.$e[2] );
			}
		}
		else
		{
			$e = $sth->errorInfo();
			error_log( 'select could not be prepared: ' .$e[0].' '.$e[1].' '.$e[2] );
		}

		return $ret;
	}

	/* fetch one row */
	public function getOne( $sql, $val=null ) { return $this->getSet( true, $sql, $val ); }
	/* fetch multiple rows */
	public function getAll( $sql, $val=null ) { return $this->getSet( false, $sql, $val ); }

	/* execute sql statement and declare whether it worked or not */
	public function exec( $sql, $val )
	{
		$ret = false;

		$this->connect();

		$sth = $this->conn->prepare( $sql );

		if( $sth )
		{
			if( $sth->execute( $val ) )
			{
				$ret = true;
			}
			else
			{
				$e = $sth->errorInfo();
				error_log( 'insert value error: ' .$e[0].' '.$e[1].' '.$e[2] .' '. print_r( $val, true ) );
			}
		}
		else
		{
			$e = $sth->errorInfo();
			error_log( 'insert statement could not be prepared: ' .$e[0].' '.$e[1].' '.$e[2] );
		}

		return $ret;
	}

	public function lastInsertId()
	{
		return $this->conn->lastInsertId();
	}
}



?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Simple  App</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1>Simple Database App</h1>

<?php
$customer = new Customer();

//$customer->firstName = "Jim";
//$customer->lastName = "Johnson";
$twitter    = isset( $_GET['twitter'] )    ? $_GET['twitter']    : null;
$firstName  = isset( $_GET['firstName'] )  ? $_GET['firstName']  : 'Jim';
$lastName   = isset( $_GET['lastName'] )   ? $_GET['lastName']   : 'Johnson';
$address    = isset( $_GET['address'] )    ? $_GET['address']    : '';


$customer->saveCustomer($firstName, $lastName, $address, $twitter);

//echo($customer->firstName);
//echo($customer->lastName);
echo $customer->fullName($firstName, $lastName);

echo '<br><br>'. PHP_EOL;

$customer->listByLastname();

$customers = $customer->getAllCustomers();
$bookings  = new Booking();

$customerId = isset( $customer->id ) ? $customer->id : null;
echo '<br><br>'. PHP_EOL;

foreach( $customers as $c )
{
	$results = $bookings->GetBookings( $c['id'] );

	foreach( $results as $result )
	{
		echo $result['booking_reference'] . ' - '. $result['customer_name'] .' - '. $result['booking_date'] .'<br>' . PHP_EOL;
	}
}

?>

</body>
</html>
