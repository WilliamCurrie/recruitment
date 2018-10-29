<?php

namespace App\Controller;

use Core\Controller\BaseController;

class IndexController extends BaseController
{
    public function indexAction()
    {
        return $this->render('index/index.html.twig');
    }
}