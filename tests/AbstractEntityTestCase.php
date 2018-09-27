<?php

namespace RecruitJordi\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitJordi\Db;

class AbstractEntityTestCase extends TestCase
{
    protected $db;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $dotenv = new Dotenv(__DIR__.'/../');
        $dotenv->load();
        $this->db = Db::getInstance();
    }
}
