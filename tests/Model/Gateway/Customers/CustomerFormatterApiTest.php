<?php


namespace Tests\Model\Gateway\Customers;

use Doctrine\ORM\ORMException;
use Model\Entity\Customer;
use Model\Gateway\Customers\CustomerFormatterApi;
use Tests\TestCaseDB;

class CustomerFormatterApiTest extends TestCaseDB
{
    /**
     * @var CustomerFormatterApi
     */
    private $sut;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        parent::setUp();
        $this->sut = new CustomerFormatterApi();
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     *
     * @throws ORMException
     */
    public function testItFormatsTheEntityCorrectlyToAPlainArray()
    {
        $customerFixture = new Customer();
        $customerFixture
            ->setFirstName('first name')
            ->setSecondName('second name')
            ->setTwitterAlias('twitter alias')
            ->setAddress('address');

        $this->em->persist($customerFixture);
        $this->em->flush(); // Now the fixture has an ID

        $actual = $this->sut->formatForGetResponse($customerFixture);

        $expected = [
            'customer_id' => $customerFixture->getId(),
            'customer_first_name' => $customerFixture->getFirstName(),
            'customer_second_name' => $customerFixture->getSecondName(),
            'customer_address' => $customerFixture->getAddress(),
            'customer_twitter_alias' => $customerFixture->getTwitterAlias()
        ];

        $this->assertEquals($expected, $actual);
    }
}