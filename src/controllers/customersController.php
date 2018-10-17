<?php
/*
* After route found send ot control to connect to model and render page..
*/
//Include all models
require_once($root.'/models/parentModel.php');

class customersController extends controller{
  public function customersPage()
  {
    $customer = new customers();
    $bookings = new bookings();

    $customer->firstName = "Jim";
    $customer->lastName = "Johnson";
    $customer->saveCustomer();

    $firstName = $customer->firstName;
    $lastName = $customer->lastName;

    $getBySurnameData = $customer->getBySurname();
    $getBySurname = implode($getBySurnameData, '');

    $getAllCustomersData = $customer->getAllCustomers();
    $getAllCustomers = '<table>';
    foreach($getAllCustomersData as $customer){
      $getAllCustomers .= '<tr>';
      $getAllCustomers .= '<td>'.$customer.'</td>';
      $getAllCustomers .= '</tr>';
    }
    $getAllCustomers .= '</table>';

    $bookingsDetails = '';
    if(isset($_GET['customerId'])){
      $results = $bookings->getBookings($_GET['customerId']);
      if($results != false){
        foreach ($results as $result){
          $bookingsDetails .= $result['bookingRef'] . ' - '. $result['customerName'] . $result['bookingDate'];
        }
      }
    }

    $pageVars = array();
    $pageVars[] = array('var' => 'firstName', 'data' => $firstName);
    $pageVars[] = array('var' => 'lastName', 'data' => $lastName);
    $pageVars[] = array('var' => 'getBySurname', 'data' => $getBySurname);
    $pageVars[] = array('var' => 'getAllCustomers', 'data' => $getAllCustomers);
    $pageVars[] = array('var' => 'getBookings', 'data' => $bookingsDetails);
    $this->pageTitle = 'Customers';
    $this->renderPage($pageVars, 'customers');
  }
}
