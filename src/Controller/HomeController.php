<?php

namespace WrRecruitment\Controller;

use WrRecruitment\Model\Customer;

class HomeController
{
    public function index()
    {

        $c = new Customer();
        $customer = $c->getCustomers();
        $vars = compact('customer');
        view('home', $vars);
    }
}
