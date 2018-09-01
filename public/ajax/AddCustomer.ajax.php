<?php
session_start();

require_once dirname($_SERVER["DOCUMENT_ROOT"]) . '/autoload.php';
new Config();

if($_POST['unique_id'] === $_SESSION['unique_id']) {

  $customer = new Customer();

  if(array_key_exists('first_name', $_POST) && $_POST['first_name'] != null) {
    $customer->first_name = $_POST['first_name'];
  } else {
    echo json_encode(array(
      'result' => 'error',
      'message' => 'No first name.',
    ));
    exit;
  }

  if(array_key_exists('second_name', $_POST) && $_POST['second_name'] != null) {
    $customer->second_name = $_POST['second_name'];
  } else {
    echo json_encode(array(
      'result' => 'error',
      'message' => 'No second name.',
    ));
    exit;
  }

  $customer->address = (array_key_exists('address', $_POST) && $_POST['address'] != null) ? $_POST['address'] : null;
  $customer->twitter_alias = (array_key_exists('twitter_alias', $_POST) && $_POST['twitter_alias'] != null) ? $_POST['twitter_alias'] : null;
  $customer->saveCustomer();
  unset($_SESSION['unique_id']);

  echo json_encode(array(
    'result' => 'success',
    'message' => 'Customer added.',
    'first_name' => $customer->first_name,
    'second_name' => $customer->second_name,
    'address' => $customer->address,
    'twitter_alias' => $customer->twitter_alias
  ));

} else {

  echo json_encode(array(
    'result' => 'error',
    'message' => 'No unique id.',
  ));

}
?>
