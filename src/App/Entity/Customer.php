<?php

namespace App\Entity;

class Customer
{
    public $title;
    public $firstName;
    public $last_name;
    public $address;

    function saveCustomer() {
        $db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if (!$db) {
            die("STOP OPPOP");
            throw new \RuntimeException("Couldn't connect to DB");
        }
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

