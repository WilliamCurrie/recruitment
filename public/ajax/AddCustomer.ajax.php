<?php
session_start();

require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';

if($_POST['unique_id'] === $_SESSION['unique_id']) {
  $customer = new Customer();
  $customer->first_name = $_POST['first_name'];
  $customer->last_name = $_POST['last_name'];
  $customer->saveCustomer();
  unset($_SESSION['unique_id']);
  echo json_encode(array(
    'result' => 'success',
    'message' => 'Customer added.',
    'first_name' => $customer->first_name,
    'last_name' => $customer->last_name,
    'unique_id' => $_POST['unique_id'],
    'session_unique_id' => $_SESSION['session_unique_id']
  ));
} else {
  echo json_encode(array(
    'result' => 'error',
    'message' => 'No unique id.',
  ));
}




 ?>
