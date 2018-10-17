<?php
class customers extends parentModel{
  public $title;
  public $firstName;
  public $lastName;
  public $address;

  public function saveCustomer()
  {
    if(!empty($this->firstName) && !empty($this->lastName) && !empty($this->address)){
      $query = $this->db->prepare("INSERT INTO `customers`
      (`first_name`, `second_name`, `address`)
      VALUES
      (?,?,?)");
      $query->bind_param('sss', $this->firstName, $this->lastName, $this->address);
      if($query->execute()){
        return 1;
      }else{
        /*
        * Error - database error pass through here...
        */
        return -1;
      }
    }else{
      /*
      * Missing - Details missing return message here...
      */
      return -2;
    }
  }
  public function getBySurname()
  {
    $query = $this->db->prepare("SELECT `first_name`, `second_name` FROM `customers` ORDER BY `second_name`");
		$query->execute();
		$query->bind_result($firstName, $lastName);
		$query->store_result();
    $rows = array();
    $i = 0;
		while($query->fetch()){
      $rows[$i] = $this->helper->formatNames($firstName, $lastName);
      $i++;
    }
    return $rows;
		$query->free_result();
    //In view loop $rows and echo..
    //Add check is no results for empty state view.
  }
  public function getCustomerById($id)
  {
    $query = $this->db->prepare("SELECT `first_name`, `second_name` FROM `customers` WHERE `id` = ?");
    $query->bind_param('s', $id);
		$query->execute();
		$query->bind_result($firstName, $lastName);
		$query->store_result();
    $return = array();
		$query->fetch();
		if($query->affected_rows == 1){
      $return['firstName'] = $firstName;
      $return['lastName'] = $lastName;
      return $return;
    }else{
      /*
      * Add better return message
      */
      return false;
    }
  }
  public function getAllCustomers()
  {
    /*Would prefer to combine this with getBySurname function as both very similar*/
    $query = $this->db->prepare("SELECT `first_name`, `second_name` FROM `customers`");
  	$query->execute();
  	$query->bind_result($firstName, $lastName);
  	$query->store_result();
    $rows = array();
    $i = 0;
  	while($query->fetch()){
      $rows[$i] = $this->helper->formatNames($firstName, $lastName);
      $i++;
    }
    return $rows;
  	$query->free_result();
  }
}
