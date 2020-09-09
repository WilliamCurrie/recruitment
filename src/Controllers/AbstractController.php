<?php

namespace Mfisher\Controllers;

use Mustache_Engine;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * AbstractController implements core controller methods
 */
abstract class AbstractController
{
    /**
     * @var Mustache_Engine
     */
    private $renderEngine;

    /**
     * Constructor for AbstractController
     *
     * @param Mustache_Engine $renderEngine
     */
    public function __construct(Mustache_Engine $renderEngine)
    {
        $this->renderEngine = $renderEngine;
    }

    /**
     * render handles rendering the html and returning the response object with rendered content as the body
     *
     * @param string $templateName
     * @param array  $args
     * @return ResponseInterface
     */
    protected function render(string $templateName, array $args = []): ResponseInterface
    {
        $template = $this->renderEngine->loadTemplate($templateName);
        $page = $template->render($args);

        $response = new Response();
        $response->getBody()->write($page);

        return $response;
    }
}