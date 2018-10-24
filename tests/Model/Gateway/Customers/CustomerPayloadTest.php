<?php


namespace Tests\Model\Gateway\Customers;


use Model\Gateway\Customers\CustomerPayload;
use PHPUnit\Framework\TestCase;

class CustomerPayloadTest extends TestCase
{
    /**
     * @var CustomerPayload
     */
    private $sut;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        parent::setUp();
        $this->sut = new CustomerPayload();
    }

    /**
     * When the object is newly created, there is no initialization for any of the properties. The object only holds
     *     information, but does not process it whatsoever
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testAllPropertiesSetToNull()
    {
        $this->assertNull($this->sut->getCustomerId());
        $this->assertNull($this->sut->getCustomerTwitterAlias());
        $this->assertNull($this->sut->getCustomerAddress());
        $this->assertNull($this->sut->getCustomerSecondName());
        $this->assertNull($this->sut->getCustomerFirstName());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testGettersAndSetters()
    {
        $this->sut
            ->setCustomerId(123)
            ->setCustomerSecondName('second name')
            ->setCustomerFirstName('first name')
            ->setCustomerTwitterAlias('twitter alias')
            ->setCustomerAddress('address');

        $this->assertEquals(123, $this->sut->getCustomerId());
        $this->assertEquals('second name', $this->sut->getCustomerSecondName());
        $this->assertEquals('first name', $this->sut->getCustomerFirstName());
        $this->assertEquals('twitter alias', $this->sut->getCustomerTwitterAlias());
        $this->assertEquals('address', $this->sut->getCustomerAddress());
    }
}