<?php

namespace Framework\Contracts;

interface ViewContract
{
    /**
     * Provides a view to output to the browser.
     *
     * @param $page
     * @param array $params
     * @return mixed
     */
    public function make($page, $params = []);
}
