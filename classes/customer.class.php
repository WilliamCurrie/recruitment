<?php
namespace Classes;
use Classes\{Core,Database,Bookings};

class Customer {

   
    

    public function __construct() {
        
    $this->db = new Database();
    
    $this->requestMethod = Core::_getRequestMethod(); /* determine how the page was called */
    $this->customer();
        
    }
    
    
    protected function customer() {
        
          if ($this->requestMethod === 'GET') {
            
            $this->getCustomersBySurname();
        } else {
             
            $this->_runAction();
        }
        
        
        
        
    }
    
    
     private function _runAction() {
      
       $this->action = filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING);/* variable submitted from the form */
      
      
       /* call the method associated with the action - basically the action with "do" prepended */
       $funcName = "do".ucfirst($this->action);
     
       if (method_exists($this,$funcName)) {
       call_user_func([$this,$funcName]);
    }
            
       
    }
    
        /* set read/write functions */
    
      private function getCustomersBySurname() {
     
        
        $query = "SELECT * FROM customers ORDER BY second_name ASC";
        $sql = $this->db->prepare($query);
        $sql->execute();
        $this->customers = $sql->fetchAll(\PDO::FETCH_OBJ);
     
        ob_start();
        include('views/customer.view.php');
        ob_end_flush();
        
    }
    
    

    private function doSaveCustomer(){
        
        $first_name = filter_input(INPUT_POST,'first_name',FILTER_SANITIZE_STRING);
        $last_name = filter_input(INPUT_POST,'last_name',FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST,'address',FILTER_SANITIZE_STRING);
  
        $sql = "INSERT INTO customers (first_name,second_name,address) VALUES (:fname,:sname,:address)";
        $q = $this->db->prepare($sql);
        $q->bindValue("address",$address,\POD::PARAM_STR);
        $q->bindValue("fname",$first_name,\PDO::PARAM_STR);
        $q->bindValue("sname",$last_name,\PDO::PARAM_STR);
        try {
                  $q->execute();
                  $_SESSION['msg']= "User added successfully!";
                  header("Location:/");
            
            
        } catch (Exception $e) {
            
                  $_SESSION['msg']= "Unable to add the user. Please check and try again";
                  header("Location:/");
            
        }
        
      
    }
    
    
    /**
     * Returns an JSON string of the user's bookings
     * 
     */
    private function doCustomerBookings() {
        $b = new Bookings();
       
       
        $id = filter_input(INPUT_POST,'userid',FILTER_VALIDATE_INT);
    
        if ($id) {
            $res = $b->getBookingsByUser($id);
              header('Content-Type: application/json');
              echo $res;
            
        }
    }
}
