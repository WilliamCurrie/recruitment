<?php

namespace RecruitMe\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitMe\Db;

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
        self::csvLoad();
    }

    protected static function csvLoad()
    {
        $rows = array_map('str_getcsv', file(self::DATA_FOLDER.'/customers.csv'));
        $header = array_shift($rows);
        foreach ($rows as $row) {
            self::$csv[] = array_combine($header, $row);
        }
    }

    protected function csvRowById($id)
    {
        $row = [];
        foreach (self::$csv as $key => $value) {
            if ($value['id'] == 1) {
                $row = $value;
                break;
            }
        }

        return $row;
    }
}
