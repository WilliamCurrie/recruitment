<?php

class ConfigurationTest extends \PHPUnit\Framework\TestCase
{
    public function testGetDbConfig()
    {
        $config = new \Core\Configuration\Configuration();

        $dbConfig = $config->getDbConfig();

        $this->assertNotNull($dbConfig['username']);
        $this->assertNotNull($dbConfig['password']);
        $this->assertNotNull($dbConfig['host']);
        $this->assertNotNull($dbConfig['port']);
        $this->assertNotNull($dbConfig['database']);
    }
}