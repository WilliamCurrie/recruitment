<?php
require_once 'db/database.class.php';

class Customer {

    // Save (INSERT) a customer record in the database
    public function save_customer($first_name = null, $second_name = null, $address = null) {

        if($first_name !== null && $second_name !== null && $address !== null) {
            $database = new Database();
            $db = $database->connect();
            $res = $db->prepare('INSERT INTO customers (first_name, second_name, address) VALUES (?, ?, ?)');
            $res->bind_param('sss', $first_name, $second_name, $address);
            $res->execute();
            $res->close();

            // Could have error checking here or try/catch if the INSERT failed

            return 'New customer saved OK!...<br>';
        } else {
            return 'All blank values must be filled in to add a customer';
        }

    }

    // Get all customers, ordered by second_name
    public function get_all_customers_by_second_name() {
        $database = new Database();
        $db = $database->connect();
        $res = $db->query('SELECT first_name, second_name FROM customers ORDER BY second_name');

        $html = '';
        while($row = $res->fetch_assoc()){
            $html .= $this->format_name($row['first_name'], $row['second_name']) . '<br>';
        }

        $res->close();

        return $html;

    }

    // Format a name by joining first_name, second_name & capitalising
    public function format_name($first_name = null, $second_name = null) {

        if($first_name !== null && $second_name !== null) {
            // Capitalise first letters of names also
            $full_name = ucfirst($first_name) . ' ' . ucfirst($second_name);
        } else {
            $full_name = '';
        }

        return $full_name;
    }

    // Get a customer by ID
    public function find_by_id($id = null) {

        $database = new Database();
        $db = $database->connect();
        $res = $db->prepare('SELECT id, first_name, second_name FROM customers WHERE id = ?');
        $res->bind_param('i', $id);
        $res->execute();
        $result = $res->get_result();

        $return = [];
        while($row = $result->fetch_assoc()) {
            $return['first_name'] = $row['first_name'];
            $return['second_name'] = $row['second_name'];
        }
        $res->close();

        return $return;
    }

    // Get all the customers from the database and output them
    public function get_all_customers() {
        $database = new Database();
        $db = $database->connect();

        $res = $db->query('SELECT first_name, second_name FROM customers');

        // Build a display table and send it back
        $html = '<table class="table table-striped">' . "\n";

        while($row = $res->fetch_assoc()) {
            $html .= '<tr>' . "\n";
            $html .= '<td>' . $row['first_name'] . '</td>' . "\n";
            $html .= '<td>' . $row['second_name'] . '</td>' . "\n";
            $html .= '</tr>' . "\n";
        }

        $html .= '</table>' . "\n";
        $res->close();

        return $html;
    }

}
