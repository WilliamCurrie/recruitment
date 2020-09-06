<?php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'testuser');
define('DB_PASS', 'password');
define('DB_NAME', 'test');
define('DB_PORT', 3306);

class Customer
{
    public $title;
    public $firstName;
    public $last_name;
    public $address;

    function saveCustomer() {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $db->query("
            INSERT INTO customers (first_name, second_name)
            VALUES ('{$this->firstName}', '{$this->last_name}', '{$this->address}'
        ");
    }

    function get_our_customers_by_surname() {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $res = $db->query('SELECT * FROM customers ORDER BY second_name');

        while ($result=$res->fetch_assoc()) {
            echo($this->formatNames($result['first_name'], $result['second_name']));
        }
    }

    public function formatNames($firstName, $surname) {
        $full_name = $firstName .= ' ';
        $full_name .= $surname;
        return $full_name;
    }

    function findById(string $id)
    {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $res = $db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');
        mysqli_close ($db);
        return $res;
    }

    // Get all the customers from the database and output them
    function getAllCustomers() {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $res = $db->query('SELECT * FROM customers');
        print '<table>';
        while ($result = $res->fetch_assoc()){
            echo '<TR>';
            echo '<TD>'.$result['first_name'].'</ td>';
            echo '<td>'.$result['second_name'].'</ TD>';
            echo '</tr>';
        }
        echo('</table>');
    }
}

class Booking
{
    public function GetBookings($id = false)
    {
        $sql = "SELECT * FROM bookings";
        if ($id !== false ) {
            $sql .= " WHERE customerID=" . $id;
        }

        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $res = $db->query($sql);

        while ($result = $res->fetch_assoc()){
            $User = User::findById($result['customerID']);
            $return[$result['id']]['customer_name'] = $User->first_name . ' ' . $User->last_name;
            $return[$result['id']]['booking_reference'] = $result['booking_reference'];
            $return[$result['id']]['booking_date'] = date('D dS M Y', result['booking_date']);
        }

        return $return;
    }
}

