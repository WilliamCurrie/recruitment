<?php
require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';
class Customer extends Base
{

  public $title;
  public $first_name;
  public $last_name;
  public $address;

  public function saveCustomer() {
    $this->_db->query('INSERT INTO customers (first_name, second_name) VALUES (\''.$this->first_name.'\', \''.$this->last_name.'\', \''.$this->address.'\')');
  }

  public function getAllCustomers($order_by = false) {
    $sql = 'SELECT * FROM customers';

    if($order_by) {
      $sql .= " ORDER BY {$order_by}";
    }

    $res = $this->_db->query($sql);

    $customers = array();
    $counter = 0;
    while($result = $res->fetch_assoc()) {
      $customers[$counter]['id'] = $result['id'];
      $customers[$counter]['name'] = $this->formatNames($result['first_name'], $result['second_name']);
      $counter++;
    }
    return $customers;

  }

  public function formatNames($first_name, $surname) {
    $full_name = $first_name . ' ' . $surname;
    return $full_name;
  }


  public function findById(string $id) {
    $res = $this->_db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');
    return $res;
  }


}
?>
