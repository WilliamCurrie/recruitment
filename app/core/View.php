<?php

namespace App\Views;

/**
 * The view class which generates the views
 */
class View
{
    /**
     * The current URL path (route) array to be passed to the controllers
     * @var array
     */
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @todo  maybe we should replace with a rendering engine (Twig or Blade)
     * @param    array $data The data to be passed to the view template
     * @param    string $view The file path / name of the view
     * @return    string
     */
    public function render($data = null, $view = null)
    {
        /**
         * Start the output buffer
         * This is needed to create the template inheritance
         */
        ob_start();
        require(sprintf('%s/../../%s/%s/views/%s.php', __DIR__, PUBLIC_PATH, THEME_PATH, $view));
    }

    /**
     * @return string
     */
    public function siteUrl()
    {
        return URL_PATH;
    }

    /**
     * @return string
     */
    public function themePath()
    {
        return THEME_PATH;
    }

    /**
     * @return string
     */
    public function publicPath()
    {
        return PUBLIC_PATH;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function cookie($key)
    {
        return $_COOKIE[$key];
    }
}
