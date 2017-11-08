<?php
define('DB_PORT', 3306);


/* New Class AppBundle/Entity/Customers
*/
class Customer
{

    public $title;
    public $firstName;
    public $last_name;
    public $address;

    /**
     * new function inside AppBundle/Manager/CustomerManager
     * at the moment pass the parameters as url parameters for GET request.
     * Normally I would create a form to send via POST
     */
    function saveCustomer()
    {
        $db = new mysqli('database', 'testuser', 'password', 'test', DB_PORT);
        $db->query('INSERT INTO customers (first_name, second_name) VALUES (\'' . $this->firstName . '\', \'' . $this->last_name . '\', \'' . $this->address . '\')');
    }

    /**
     * function in App/Bundle/CustomerRepository
     * findAll(sort = true)
     */
    function get_our_customers_by_surname()
    {
        $db  = new \mysqli('database', 'testuser', "password", 'test', DB_PORT);
        $res = $db->query('SELECT * FROM customers ORDER BY second_name');
        while ($result = $res->fetch_assoc()) {
            echo($this->formatNames($result['first_name'], $result['second_name']));
        }
    }

    /**
     * new getter in Customer Entity ( getFullName() )
     */
    public function formatNames($firstName, $surname)
    {
        $full_name = $firstName .= ' ';
        $full_name .= $surname;


        return $full_name;
    }


    /**
     * function findById() in AppBundle/Repository/CustomersRepository
     *
     *
     */
    function findById( $id)
    {
        $db  = new \mysqli('127.0.0.1', 'testuser', 'password', 'test', DB_PORT);
        $res = $db->query('SELECT * FROM customers WHERE id = \'' . $id . '\'');
        mysqli_close($db);
        return $res;
    }

    /**
     * function to get all customers in CustomersRepository
     * Controller to get the data and display template with results
     * twig template in app/Resources/views/customer/list.html.twig
     */
    //Get all the customers from the database and output them
    function getAllCustomers()
    {
        $db = new mysqli('127.0.0.1', 'testuser', 'password', 'test', DB_PORT);


        $res = $db->query('SELECT * FROM customers');
        print '<table>';
        while ($result = $res->fetch_assoc()) {
            echo '<TR>';
            echo '<TD>' . $result['first_name'] . '</ td>';
            echo '<td>' . $result['second_name'] . '</ TD>';
            echo '</tr>';
        }


        echo('</table>');
    }


}


/**
 * new Entity AppBundle\Entity\Bookings
 */
class Booking
{

    /**
     * function in Repository to get all bookings
     * Controller to get data and display template
     * app/Resources/views/booking/booking.html.twig
     */
    public function GetBookings($id = false)
    {
        $sql = "SELCT * FROM bookings";
        if ($id !== false) {
            $sql .= " WHERE customerID=" . $id;
        }


        $db  = new \mysqli('127.0.0.1', 'testuser', 'password', 'test', DB_PORT);
        $res = $db->query($sql);

        while ($result = $res->fetch_assoc()) {
            $User                                       = User::findById($result['customerID']);
            $return[$result['id']]['customer_name']     = $User->first_name . ' ' . $User->last_name;
            $return[$result['id']]['booking_reference'] = $result['booking_reference'];
            $return[$result['id']]['booking_date']      = date('D dS M Y', result['booking_date']);
        }

        return $return;
    }

}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Simple App</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<h1>Simple Database App</h1>

<?php
/*Create new Customer function inside CustomerManager
$customer            = new Customer();
$customer->firstName = "Jim";
$customer->last_name = "Johnson";
echo($customer->firstName);
echo($customer->last_name);
$customer->saveCustomer();
*/


/*
 * new route:
 * /customer/secondname

$customer->get_our_customers_by_surname();
*/

/*
new route
/customer/list

$customer->getAllCustomers();
*/


/*
 * new route
 * /booking/list


$bookings = new Booking();
$results  = $bookings->GetBookings($_GET['customerId']);
foreach ($results as $result):
    echo $result['booking_reference'] . ' - ' . $result['customer_name'] . $result['booking_date'];
endforeach;

*/
?>

</body>
</html>

<?php ?>
