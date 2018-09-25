<?php

namespace RecruitJordi\Tests;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use RecruitJordi\Db;

class RepositoryTestCase extends TestCase
{
    const DATA_FOLDER = __DIR__.'/data';

    protected $db;

    protected $csv = [];

    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__.'/../');
        $dotenv->load();

        $this->db = Db::getInstance();
    }

    protected function csvLoad($filename)
    {
        $rows = array_map('str_getcsv', file($filename));
        $header = array_shift($rows);
        foreach ($rows as $row) {
            $this->csv[] = array_combine($header, $row);
        }
    }

    protected function csvRows($data)
    {
        $rows = [];
        foreach ($this->csv as $key => $value) {
            if ($value[key($data)] == current($data)) {
                $rows[] = $value;
            }
        }

        return $rows;
    }
}
