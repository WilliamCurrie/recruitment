<?php

namespace Util\Controller;

use Start\Application;

class BaseController
{
    /**
     * @var array
     */
    public static $request;

    /**
     * @param string $templatePath
     * @param array $data
     *
     * @return null
     */
    protected function view($templatePath, array $data = [])
    {
        $template = $templatePath . '.html';
        echo Application::$container['twig']->render($template, $data);

        return null;
    }
}
