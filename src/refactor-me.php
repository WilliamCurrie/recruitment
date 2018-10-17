<?php
if ($_SERVER['DOCUMENT_ROOT']) {
    $root = realpath($_SERVER['DOCUMENT_ROOT']);
}

//Include Controller
require_once($root.'/controllers/mainController.php');
//Work out current route
$route = explode('?', $_SERVER['REQUEST_URI'], 2);
// Route it up!
switch ($route[0]) {
  // Home page
  case '/':
    //All show customers page
    $controller = new controller();
    $controller->home();
    break;
  //Customers page
  case '/customers':
    $controller = new customersController();
    $controller->customersPage();
    break;
  //404
  default:
    header('HTTP/1.0 404 Not Found');
    $controller = new controller();
    $controller->notFound404();
    break;
}
?>
