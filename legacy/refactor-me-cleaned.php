<?php

class DB
{
    public static function query($sql, $binds = [])
    {
        $config = (Object)[
            'host'      => 'database',
            'port'      => 3306,
            'dbname'    => 'test',
            'charset'   => 'utf8mb4',
        ];

        $dsn  = "mysql:host={$config->host};port={$config->port};dbname={$config->dbname};charset={$config->charset}";
        $pdo  = new \PDO($dsn);
        $stmt = $pdo->query($sql);

        foreach ($binds as $param => $variable) {
            $stmt->bindParam($param, $variable);
        }

        return $stmt->fetchAll();
    }
}

class Customer
{
    /** @var string */
    public $firstName;
    /** @var string */
    public $last_name;
    /** @var string */
    public $address;

    function saveCustomer()
    {
        DB::query("INSERT INTO customers (first_name, second_name, address) VALUES (:firstName, :secondName, :address)", [
            'firstName' => $this->firstName,
            'secondName' => $this->last_name,
            'address' => $this->address
        ]);
    }

    function getCustomersBySurnameAndPrintThem()
    {
        $customers = DB::query('SELECT * FROM customers ORDER BY second_name');

        foreach ($customers as $customer) {
            echo "{$customer['first_name']} {$customer['second_name']}";
        }
    }

    function findById(int $id)
    {
        return DB::query("SELECT * FROM customers WHERE id = :id", [
            'id' => $id,
        ]);
    }

    public function getAllCustomersAndPrintThem()
    {
        $customers = DB::query("SELECT * FROM customers");

        echo '<table>';
        foreach ($customers as $customer) {
            echo '<tr>';
            echo "<td>{$customer['first_name']}</td>";
            echo "<td>{$customer['second_name']}</td>";
            echo '</tr>';
        }
        echo '</table>';
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}

class Booking
{
    public function getBookings(?int $id = null)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        if (!is_numeric($id) || $id < 0 || strlen($id) > 15) {
            throw new \Exception('Stop it');
        }

        $sql = "SELECT * FROM customers";

        if ($id) {
            $sql .= " WHERE id = :id";
        }

        $bookings = DB::query($sql, [
            'id' => $id
        ]);

        $customerClass = new Customer();

        $results = [];
        foreach ($bookings as $booking) {
            $customer = $customerClass->findById($booking['customer_id']);

            $results[] = [
                'customer_name'     => "{$customer['first_name']} {$customer['second_name']}",
                'booking_reference' => $booking['reference'],
                'booking_date'      => date('D dS M Y', $booking['date'])
            ];
        }

        return $results;
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
    </head>
    <body>
        <h1>Simple Database App</h1>

        <?php
        $customer = new Customer();
        $customer->setFirstName('Jim')->setLastName('Johnson');
        $customer->saveCustomer();
        $customer->getCustomersBySurnameAndPrintThem();
        $customer->getAllCustomersAndPrintThem();

        $bookings = new Booking();

        $results = $bookings->getBookings($_GET['customerId']);
        foreach ($results as $result) {
            echo $result['booking_reference'] . ' - ' . $result['customer_name'] . $result['booking_date'];
        }
        ?>
    </body>
</html>
