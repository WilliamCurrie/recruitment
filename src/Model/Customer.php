<?php

namespace WrRecruitment\Model;

use WrRecruitment\Core\Database;

class Customer extends Model {

	public $firstname;
	public $lastname;
	public $address;


	public function save(){
		$query = 'INSERT INTO customers (first_name, second_name, address) VALUES (\''.$this->firstname.'\', \''.$this->lastname.'\', \''.$this->address.'\')';
		$this->db->query($query);
	}

	public function getCustomers(){
		$res = $this->db->query('SELECT * FROM customers ORDER BY second_name');
		$return = array();
		while($result=$res->fetch_assoc()){
			$return[$result['id']]['firstname'] = $result['first_name'];
			$return[$result['id']]['lastname'] = $result['second_name'];
			$return[$result['id']]['address'] = $result['address'];
		}
		return $return;
	}

	public function findById(string $id){
		$res = $this->db->query('SELECT * FROM customers WHERE id = \''.$id.'\'');
		$res = $res->fetch_assoc();
		$this->firstname = $res['first_name'];
		$this->lastname = $res['second_name'];
		$this->address = $res['address'];
		return $this;
	}




}