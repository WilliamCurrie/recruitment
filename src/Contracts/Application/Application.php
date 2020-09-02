<?php

namespace Wranx\Contracts\Application;

/**
 * Interface Application
 * @package Wranx\Contracts\Application
 */
interface Application
{
    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version(): string;
}