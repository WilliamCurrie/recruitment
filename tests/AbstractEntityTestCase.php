<?php

namespace RecruitJordi\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitJordi\Db;

class AbstractEntityTestCase extends TestCase
{
    protected $db;

    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__.'/../');
        $dotenv->load();

        $this->db = Db::getInstance();
    }
}
