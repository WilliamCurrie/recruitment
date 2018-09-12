<?php

class Booking {
    
    private $dbc;
    private $ret;

        public function __construct($dbc) {

        $this->dbc = $dbc;
        }
    
        private function findById($id){
        
        
        $res = 'SELECT * FROM customers WHERE id = \''.$id.'\'';
        $sql = mysqli_query($this->dbc,$res);
        $retSql = $sql->fetch_assoc();
        
        
        return ($retSql);
        
        
        }


        public function GetBookings($id = false){

	    $sql = "SELECT * FROM bookings";
        if ($id !== false ) {
            $sql .= " WHERE customerID=" . $id;
        }
//dbconnect
        $res = mysqli_query($this->dbc,$sql);
        

            while($result= $res->fetch_assoc()){ 		// mysqli fetch  
        $user1 = $this->findById($result['customerID']);
           // print_r($user1);
            $ret[$result['id']]['customer_name']= $user1['first_name']. ' ' . $user1['second_name'];
            $ret[$result['id']]['booking_reference'] = $result['booking_reference'];
            $ret[$result['id']]['booking_date'] = date('Y M D',strtotime($result['booking_date']));
           
            return $ret;
            }
            
        } 
        
    
   } 

?>