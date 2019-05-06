<?php
namespace Classes;
use Classes\{Database};



class Bookings {
   

    protected $bookings;
    
    public function __construct() {
        
    $this->db = new Database();
        
    }
    
    public function getBookingsByUser(int $id) : string 
        {
       
        
        
        $query = "SELECT booking_reference, DATE_FORMAT(booking_date,'%W %D %M %Y') as `booked_date` FROM bookings WHERE customerID = :id ORDER BY booking_date DESC";
        $sql = $this->db->prepare($query);
        $sql->bindParam("id",$id,\PDO::PARAM_INT);
        $sql->execute();
        $this->bookings = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $response = ($this->bookings) ?? [];
        return json_encode($response);
        
        
    }
    
    
}
