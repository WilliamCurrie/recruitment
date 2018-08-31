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

  public function getOurCustomersBySurname() {
    $res = $this->_db->query('SELECT * FROM customers ORDER BY second_name');
    while($result = $res->fetch_assoc()) {
      echo($this->formatNames($result['first_name'], $result['second_name']));
    }
  }

  public function formatNames($first_name, $surname) {
    $full_name = $first_name . ' ' . $surname;
    return $full_name;
  }


  public function findById(string $id) {
    $res = $this->_db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');
    return $res;
  }

  //Get all the customers from the database and output them
  public function getAllCustomers() {
    $res = $this->_db->query('SELECT * FROM customers');
    print '<table>';
    while ($result = $res->fetch_assoc()){
      echo '<tr>';
      echo '<td>'.$result['first_name'].'</ td>';
      echo '<td>'.$result['second_name'].'</td>';
      echo '</tr>';
    }
    echo('</table>');
  }

}
?>
