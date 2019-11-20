<?php

namespace WilliamCurrie\Recruitment\Templating;

use WilliamCurrie\Recruitment\Exceptions\TemplatingException;

interface TemplateInterface
{
    /**
     * Generates text based output using a template and optional input variables
     *
     * @param string $templateFile path to template file relative to configured template root
     * @param array|null $data Optional. Values to be used with template assoc is advised, may be multi-dimensional
     * @return string returns compiled output
     * @throws TemplatingException on exception in template handler
     */
    public function render(string $templateFile, array $data = []): string;
}