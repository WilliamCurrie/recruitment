<?php

namespace RecruitMe\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitMe\Db;

class DbTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        $dotenv = new Dotenv(__DIR__.'/../');
        $dotenv->load();
    }

    /**
     * @test
     */
    public function get_instance()
    {
        $db = Db::getInstance();

        $this->assertInstanceOf(Db::class, $db);
    }
}
