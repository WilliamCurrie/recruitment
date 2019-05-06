<?php

namespace Classes;

/*
 * Add core static functions here to use across other classes.
 * 
 * 
 */

class Core {
   

      /**
     * Grab the request method to determine how we handle the page
     * 
     * @return string
     */
    
    public static function _getRequestMethod() : string {
        
        return filter_input(INPUT_SERVER,'REQUEST_METHOD');
        
    }
    
    
    
    
    
    
}
