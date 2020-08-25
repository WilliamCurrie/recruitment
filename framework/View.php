<?php

namespace Framework;

use Framework\Contracts\ConfigContract;
use Framework\Contracts\ViewContract;

class View implements ViewContract
{
    private $viewGenerator;

    public function __construct(ConfigContract $config)
    {
        $this->viewGenerator = $config->get('views.class');
        $locations = $config->get('views.locations');
        $this->viewGenerator = new $this->viewGenerator('../app/'.$locations['views'], '../app/'.$locations['cache']);
    }

    public function make($page, $params = [])
    {
        echo $this->viewGenerator->make($page, $params)->render();
    }
}
