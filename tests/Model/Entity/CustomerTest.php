<?php


namespace Tests\Model\Entity;


use Model\Entity\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    /**
     * @var Customer
     */
    private $sut;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        parent::setUp();
        $this->sut = new Customer();
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testGettersAndSetters()
    {
        $this->sut
            ->setAddress('address')
            ->setTwitterAlias('twitter alias')
            ->setSecondName('second name')
            ->setFirstName('first name');

        $this->assertEquals('address', $this->sut->getAddress());
        $this->assertEquals('twitter alias', $this->sut->getTwitterAlias());
        $this->assertEquals('second name', $this->sut->getSecondName());
        $this->assertEquals('first name', $this->sut->getFirstName());
    }
}