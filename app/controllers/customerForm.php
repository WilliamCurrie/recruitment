<?php

namespace App\Controllers;

use App\Models\Customer;

class CustomerForm extends Controller
{
    private $data;
    private $fields = array('customerId','firstName', 'lastName', 'fullAddress', 'twitterAlias');
    protected $view = 'form/customer';
    private $objectId;

    public function __construct($route = array())
    {
        parent::__construct($route);
        $this->objectId = isset($route[2]) && is_numeric($route[2]) ? intval($route[2]) : NULL;
    }

    private function getData()
    {
        // sanitize
        foreach ($this->fields as $field) $this->data[$field] = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
        if (!$_POST) $this->data = (new Customer($this->objectId))->getCustomerData();
        if ($_POST) $this->saveData();
    }

    private function saveData()
    {
        // validate
        if (empty($this->data['firstName']) || empty($this->data['lastName']) || empty($this->data['fullAddress'])) {
            $this->data['signal'] = 'warning';
            $this->data['message'] = 'Please enter a first name, last name and address. These are all required fields <span class="text-primary">(*)</span>.';
            return;
        }

        // save
        $customer = new \App\Models\Customer();
        if ($customer->setCustomerData($this->data)) {
            $isInsert = empty($this->data['customerId']) ? TRUE : FALSE;
            $message = $isInsert ?
                $this->data['firstName'] . ' ' . $this->data['lastName'] . ' is now a customer.' :
                'Changes to ' . $this->data['firstName'] . ' ' . $this->data['lastName'] . ' have been saved';
            $this->data['signal'] = 'success';
            $this->data['message'] = '<i class="fas fa-check mr-2"></i>' . $message;
            if ($isInsert) foreach ($this->fields as $field) $this->data[$field] = NULL;
        }
    }

    public function setData()
    {
        $this->getData();
        return $this->data;
    }
}
