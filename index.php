<?php
session_start();
include('autoload.php');


use Classes\{Core,Customer};



class Index {
    
    
      public function __construct() {
        
      
        $this->method = Core::_getRequestMethod(); /* determine how the page was called */
        $this->customer = new Customer();
       
        
           
    }
    
    
  
    
    

}

$g = new Index();