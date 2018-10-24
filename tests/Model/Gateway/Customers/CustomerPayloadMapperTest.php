<?php


namespace Tests\Model\Gateway\Customers;


use Model\Gateway\Customers\CustomerPayloadMapper;
use Model\Helpers\Http\InputSanitizer;
use PHPUnit\Framework\TestCase;

class CustomerPayloadMapperTest extends TestCase
{
    /**
     * @var CustomerPayloadMapper
     */
    private $sut;
    /**
     * @var InputSanitizer
     */
    private $inputSanitizer;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        parent::setUp();

        $this->inputSanitizer = new InputSanitizer();

        $this->sut = new CustomerPayloadMapper($this->inputSanitizer);
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testItSanitizesTheEntry()
    {
        $requestPayload = [
            'customer_id' => 123,
            'customer_first_name' => '<script first name',
            'customer_second_name' => '&nbsp; second name',
            'customer_address' => '<>address',
            'customer_twitter_alias' => '/> customer twitter alias'
        ];

        $actual = $this->sut->mapFromRequest($requestPayload);

        $this->assertEquals(123, $actual->getCustomerId());
        $this->assertEmpty($actual->getCustomerFirstName());
        $this->assertEquals("&amp;amp;nbsp; second name", $actual->getCustomerSecondName());
        $this->assertEquals("address", $actual->getCustomerAddress());
        $this->assertEquals("/&amp;gt; customer twitter alias", $actual->getCustomerTwitterAlias());

    }


}