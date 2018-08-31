<?php
function autoload($class_name) {
  $dirs = array(
    '/config/',
    '/app/'
  );
  foreach($dirs as $dir) {
    if(file_exists(dirname($_SERVER["DOCUMENT_ROOT"]) . $dir . $class_name . '.class.php')) {
      require_once dirname($_SERVER["DOCUMENT_ROOT"]) . $dir . $class_name . '.class.php';
    }
  }
}
spl_autoload_register('autoload');
 ?>
