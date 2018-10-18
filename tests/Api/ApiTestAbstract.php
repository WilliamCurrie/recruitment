<?php
namespace Tests\Api;

use PHPUnit\Framework\TestCase;
use GuzzleHttp;

class ApiTestAbstract extends TestCase
{
    /** @var GuzzleHttp\Client */
    protected $http;

    public function setUp()
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost:8080/api/']);
    }

    public function tearDown() {
        $this->http = null;
    }
}