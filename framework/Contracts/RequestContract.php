<?php

namespace Framework\Contracts;

interface RequestContract
{
    /**
     * Gets a request parameter by key.
     *
     * @param $key
     * @return mixed
     */
    public function get($key);
}
