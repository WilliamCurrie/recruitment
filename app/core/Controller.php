<?php

namespace App\Controllers;

use App\Views;

/**
 * The base Controller upon which all the other controllers are extended on
 */
class Controller
{
    /**
     * The view object to be passed to the controllers
     * @var    object
     */
    protected $view;

    /**
     * The current URL path (route) array to be passed to the controllers
     * @var array
     */
    protected $url;

    /**
     * POST values
     */
    protected $request;

    /**
     * Controller constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->request = $_POST;

        // Instantiate the View
        $this->view = new Views\View([], 'en', $this->url);
    }
}
