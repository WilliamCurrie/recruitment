<?php

use \PHPUnit\Framework\TestCase;
class ExampleTest extends TestCase {

    /**
     * @test
     */
    public function test(){

        $var = true;
        $this->assertTrue($var);
    }
}