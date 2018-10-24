<?php


namespace Tests\Model\Gateway\Customers;


use Model\Entity\Customer;
use Model\Gateway\Customers\CustomerPayload;
use Model\Gateway\Customers\CustomerPayloadForPutValidator;
use PHPUnit\Framework\TestCase;

class CustomerPayloadForPutValidatorTest extends TestCase
{
    /**
     * @var CustomerPayloadForPutValidator
     */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = new CustomerPayloadForPutValidator();
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @return array
     */
    public function complaintsAboutFirstAndSecondNameMissingDataProvider() : array
    {
        $c1 = new CustomerPayload();

        $c2 = new CustomerPayload();
        $c2->setCustomerFirstName('');
        $c2->setCustomerSecondName('');

        $c3 = new CustomerPayload();
        $c3->setCustomerFirstName('first name');

        $c4 = new CustomerPayload();
        $c4->setCustomerSecondName('second name');

        $result = [
            [
                $c1,
                [
                    'Customer first name is compulsory',
                    'Customer second name is compulsory'
                ]
            ],
            [
                $c2,
                [
                    'Customer first name is compulsory',
                    'Customer second name is compulsory'
                ]
            ],
            [
                $c3,
                [
                    'Customer second name is compulsory'
                ]
            ],
            [
                $c4,
                [
                    'Customer first name is compulsory'
                ]
            ]
        ];

        return $result;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param CustomerPayload $cp
     * @param array $expectedErrors
     *
     * @dataProvider complaintsAboutFirstAndSecondNameMissingDataProvider
     */
    public function testItComplaintsAboutFirstAndSecondNameMissing(CustomerPayload $cp, array $expectedErrors)
    {
        $actual = $this->sut->validate($cp);

        $this->assertEquals($expectedErrors, $actual);
    }
}