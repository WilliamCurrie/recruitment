<?php
if(!class_exists('Base')) {
  require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';
}

class Customer extends Base
{
  public $title;
  public $first_name;
  public $second_name;
  public $address;

  public function saveCustomer() {

    if($this->title != null) {
      $this->title = $this->sanitise($this->title);
    }
    if($this->first_name != null) {
      $this->first_name = $this->sanitise($this->first_name);
    }
    if($this->second_name != null) {
      $this->second_name = $this->sanitise($this->second_name);
    }
    if($this->address != null) {
      $this->address = $this->sanitise($this->address);
    }
    if($this->twitter_alias != null) {
      $this->twitter_alias = $this->sanitise($this->twitter_alias);
    }

    $query = $this->_db->prepare("INSERT INTO customers (`title`, `first_name`, `second_name`, `address`, `twitter_alias`) VALUES (?,?,?,?,?)");
    $query->bind_param("sssss", $this->title, $this->first_name, $this->second_name, $this->address, $this->twitter_alias);
    $query->execute();

    if($query->affected_rows === 0) {
      error_log("No rows updated when trying to add new customer: $this->title, $this->first_name, $this->second_name, $this->address, $this->twitter_alias");
      return false;
    }

    return true;
  }

  public function getAllCustomers($order_by = false) {
    $sql = 'SELECT * FROM customers';
    if($order_by) {
      $escaped_order_by = $this->sanitise($order_by);
      $sql .= " ORDER BY {$escaped_order_by}";
    }
    return $this->_db->query($sql);
  }

  public function getAllCustomersFormatted($order_by = false) {
    $res = $this->getAllCustomers($order_by);
    $customers = array();
    $counter = 0;
    while($result = $res->fetch_assoc()) {
      $customers[$counter]['id'] = $result['id'];
      $formatted_name = $this->formatNames($result['first_name'], $result['second_name']);
      if($formatted_name !== false) {
        $customers[$counter]['name'] = $formatted_name;
      }
      $counter++;
    }
    return $customers;
  }

  public function formatNames($first_name = null, $second_name = null) {
    if($first_name !== null && $second_name !== null) {
      $full_name = $first_name . ' ' . $second_name;
      return $full_name;
    }
    error_log("Could not format name $first_name . ' ' . $second_name");
    return false;
  }

  public function findById($id = null) {
    if($id !== null) {
      $res = $this->_db->query('SELECT * FROM customers WHERE id = \''. (int)$id .'\'');
      return $res->fetch_object();
    }
    error_log("Could not find customer with ID of $id");
    return false;
  }


}
?>
