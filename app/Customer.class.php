<?php
class Customer extends Base
{

  public $title;
  public $firstName;
  public $last_name;
  public $address;

  function saveCustomer() {
    $this->_db->query('INSERT INTO customers (first_name, second_name) VALUES (\''.$this->firstName.'\', \''.$this->last_name.'\', \''.$this->address.'\')');
  }

  function get_our_customers_by_surname() {
    $res = $this->_db->query('SELECT * FROM customers ORDER BY second_name');
    while($result=$res->fetch_assoc()) {
      echo($this->formatNames($result['first_name'], $result['second_name']));
    }
  }

  public function formatNames($firstName, $surname) {
    $full_name = $firstName .= ' ';
    $full_name .= $surname;
    return $full_name;
  }


  function findById(string   $id) {
    $res = $this->_db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');
    return $res;
  }

  //Get all the customers from the database and output them
  function getAllCustomers() {
    $res = $this->_db->query('SELECT * FROM customers');
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
?>
