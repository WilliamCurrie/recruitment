<?php


namespace Bff\Helpers;


class TemplateHelper
{
    private $templateFile;

    public function __construct($template_file)
    {
        $this->templateFile = "../src/Views/$template_file";
    }

    public function render()
    {
        require($this->templateFile);
    }
}
