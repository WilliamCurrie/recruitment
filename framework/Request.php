<?php

namespace Framework;

use Framework\Contracts\RequestContract;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request implements RequestContract
{
    /**
     * @var SymfonyRequest
     */
    private $request;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->request = SymfonyRequest::createFromGlobals();
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->request->get($key);
    }
}