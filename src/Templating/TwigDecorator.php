<?php

declare(strict_types=1);

namespace WilliamCurrie\Recruitment\Templating;

use Exception;
use Twig\Environment;
use WilliamCurrie\Recruitment\Exceptions\TemplatingException;

class TwigDecorator implements TemplateInterface
{
    /**
     * @var Environment Twigs environment object
     */
    protected $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @inheritDoc
     */
    public function render(string $templateFile, array $data = []): string
    {
        try {
            return $this->twig->render($templateFile, $data);
        } catch (Exception $e) {
            throw new TemplatingException($e);
        }
    }
}
