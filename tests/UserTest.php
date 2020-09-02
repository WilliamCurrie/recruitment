<?php


use Bff\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testFindById()
    {

        $user = new User();
        $result = $user->findById(1);

        $this->assertEquals(true, is_array($result), "result isn't an array");
        $this->assertEquals(true, isset($result['id']), "result id isn't set");
        $this->assertEquals(1, $result['id'], "result id isn't 1");

        $result = $user->findById('rubbish');

        $this->assertEquals(false, is_array($result), "result is an array");
    }
}
