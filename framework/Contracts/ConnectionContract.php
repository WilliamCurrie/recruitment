<?php

namespace Framework\Contracts;

interface ConnectionContract
{
    /**
     * Boots the connection to DB.
     *
     * @return mixed
     */
    public function boot();
}
