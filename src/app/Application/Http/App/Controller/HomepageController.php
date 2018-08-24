<?php

namespace Wranx\Application\Http\App\Controller;

use Wranx\Framework\Buffer\OutputBuffer;
use Zend\Diactoros\Response\HtmlResponse;

class HomepageController
{
    public function __invoke()
    {
        return new HtmlResponse(OutputBuffer::capture(function () {
            require __DIR__ . '/../../App/Resources/home.php';
        }));
    }
}
