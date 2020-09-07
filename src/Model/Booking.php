<?php

namespace WrRecruitment\Model;

class Booking extends Model {

	public function GetBookings($id = false)
	{
		$sql = "SELECT * FROM bookings";
		if ($id !== false ) {
			$sql .= " WHERE customerID = '" . $id. "'";
		}


		$res = $this->db->query($sql) or die($this->db->error);

		while ($result = $res->fetch_assoc()){
			$c = new Customer($this->db);
			$customer = $c->findById($result['customerID']);
			$return[$result['id']]['customer_name'] = $customer->firstname . ' ' . $customer->lastname;
			$return[$result['id']]['booking_reference'] = $result['booking_reference'];
			$return[$result['id']]['booking_date'] = date('D dS M Y', $result['booking_date']);
		}

		return $return;
	}


}