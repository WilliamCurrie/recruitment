<?php

namespace App;

use App\Controllers\HttpException;

/**
 * The app router which decides what router and method is selected based on the user's input
 */
class App
{
    /**
     * Default controller if none is specified
     * @var    string
     */
    protected $controller = 'HomeController';

    /**
     * Default method if none is specified
     * @var string
     */
    protected $method = 'index';

    /**
     * List of GET parameters sent by the user
     * @var array
     */
    protected $url = [];

    /**
     * Database driver
     * @var \mysqli
     */
    protected $db;

    /**
     * App constructor.
     */
    public function __construct()
    {
        // Load dependencies
        $this->loadDependencies();

        // Parse the URL
        $this->parseUrl();
        try {
            $url = ucfirst($this->url[1]);

            // Check if the controller exists
            if (isset($url)) {

                if (file_exists(__DIR__ . '/../controllers/' . $url .'Controller.php')) {
                    // Set the controller
                    $this->controller = $url.'Controller';
                }
            }
            require_once(__DIR__ . '/../controllers/' . $this->controller . '.php');

            /**
             * The namespace\class must be defined in a string as it can't be called shorted using new namespace\$var
             */
            $class = 'App\Controllers\\' . $this->controller;
            $this->controller = new $class($this->url);

            if (isset($this->url[2])) {
                $this->method = 'getInfo';

            }

            // Call the method from the controller and pass the params
            $data = call_user_func_array([$this->controller, $this->method], $this->url);

            if (!$data) {
                header('HTTP/1.0 404 Not Found');

            }


        } catch (HttpException $exception) {
            header('HTTP/1.0 404 Not Found');
            exit($exception->getMessage());
        }
    }

    /**
     * Load Dependencies
     */
    private function loadDependencies()
    {
        if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
            require_once(__DIR__ . '/../../vendor/autoload.php');
        }
    }

    /**
     * Parse and set the GET parameters sent by the user
     */
    public function parseUrl() :void
    {
        if (isset($_GET['url'])) {
            $this->url = explode('/', rtrim($_GET['url'], '/'));
        }

    }
}
