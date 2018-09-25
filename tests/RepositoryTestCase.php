<?php

namespace RecruitJordi\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitJordi\Db;

class RepositoryTestCase extends TestCase
{
    const DATA_FOLDER = __DIR__.'/data';

    protected static $db;

    protected static $csv = [];

    public static function setUpBeforeClass()
    {
        $dotenv = new Dotenv(__DIR__.'/../');
        $dotenv->load();

        self::$db = Db::getInstance();
    }

    protected static function csvLoad($filename)
    {
        $rows = array_map('str_getcsv', file($filename));
        $header = array_shift($rows);
        foreach ($rows as $row) {
            self::$csv[] = array_combine($header, $row);
        }
    }

    protected function csvRows($data)
    {
        $rows = [];
        foreach (self::$csv as $key => $value) {
            if ($value[key($data)] == current($data)) {
                $rows[] = $value;
            }
        }

        return $rows;
    }
}
