 <?php
 
spl_autoload_register(function($className) {
 
	include_once strtolower(filter_input(INPUT_SERVER,'DOCUMENT_ROOT') .'/'. preg_replace('/\\\/','/',$className) . '.class.php');
        
});