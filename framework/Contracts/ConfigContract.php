<?php

namespace Framework\Contracts;

interface ConfigContract
{
    /**
     * Gets the config array.
     *
     * @param $key
     * @return mixed
     */
    public function get($key);
}
