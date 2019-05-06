<?php
namespace Classes;
/* Reusable DB class for handling DB connections */
class Database extends \PDO {
 


    public function __construct($ini = 'settings.ini') {
        /* set credentials */

        if (!$settings = parse_ini_file($ini, TRUE)) throw new exception('Unable to open ' . $ini . '.');
        
        $dns = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['schema'];
        
        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
      
    }

   

}
