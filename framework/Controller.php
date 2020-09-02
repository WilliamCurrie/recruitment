<?php

namespace Framework;

use Framework\Contracts\RequestContract;
use Framework\Contracts\ViewContract;

abstract class Controller
{
    /**
     * @var RequestContract
     */
    public $request;
    /**
     * @var ViewContract
     */
    public $viewGenerator;

    public function __construct(
        RequestContract $request,
        ViewContract $viewGenerator
    ) {
        $this->request = $request;
        $this->viewGenerator = $viewGenerator;
    }
}
