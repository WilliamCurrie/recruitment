<?php

namespace App\Controller;

use Core\Controller\BaseController;

/**
 * Class ExceptionController
 *
 * @package App\Controller
 */
class ExceptionController extends BaseController
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function exception404Action()
    {
        return $this->render('exception/404.html.twig');
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function exception405Action()
    {
        return $this->render('exception/405.html.twig');
    }
}
