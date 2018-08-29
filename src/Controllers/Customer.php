<?php
class Customer
{
    public $title;
    public $firstName;
    public $lastName;
    public $address;

    public function __construct()
    {

        $this->title;
        $this->firstName;
        $this->lastName;
        $this->address;

        $db = Database::getInstance();
        $this->_dbh = $db->getConnection();
    }

    //Get all the customers from the database and output them
    public function getAllCustomers() 
    {
        $datas = [];
        $result = $this->_dbh->query('SELECT first_name, second_name FROM customers');
        while ($row = $result->fetch_assoc()){
            $datas[] = array( 'first_name' => $row['first_name'], 'second_name' => $row['second_name'] );
        }
        return $datas;
    }

    public function saveCustomer()
    {
        if( $this->firstName )
            $firstName = $this->_dbh->real_escape_string($this->firstName);
        if( $this->lastName )
            $lastName = $this->_dbh->real_escape_string($this->lastName);

        $query = "INSERT INTO customers (first_name, second_name) VALUES ('$firstName', '$lastName')";
        $this->_dbh->query( $query );
    }

    public function getCustomersSurname()
    {
        $datas = [];
        $query = "SELECT first_name, second_name FROM customers ORDER BY second_name";
        $result = $this->_dbh->query( $query );
        while($row =$result->fetch_assoc()){
            $datas[] = $this->formatNames( $row['first_name'], $row['second_name'] );
        }
        return $datas;
    }

    public function formatNames($firstName, $surname) 
    {
        $full_name = $firstName .= ' ';
        $full_name .= $surname;
        return $full_name;
    }

    public function findById($id)
    {
        $id = (int)$id;
        $query = "SELECT * FROM customers WHERE id = ". $id;
        $result = $this->_dbh->query( $query );
        return $result->fetch_assoc();
    }
}
