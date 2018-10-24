<?php


namespace Tests\Model\Gateway\Customers;


use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Model\Entity\Booking;
use Model\Entity\Customer;
use Model\Enums\SortingDirection;
use Model\Gateway\Customers\CustomersGateway;
use Tests\TestCaseDB;

class CustomersGatewayTest extends TestCaseDB
{
    /**
     * @var CustomersGateway
     */
    private $sut;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        parent::setUp();
        $this->sut = new CustomersGateway($this->em);
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     *
     * @throws ORMException
     */
    public function testGetsAllCustomers()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $customer1 = new Customer();
        $customer2 = new Customer();
        $customer3 = new Customer();

        $customer1
            ->setFirstName('1')
            ->setSecondName('2');

        $customer2
            ->setFirstName('3')
            ->setSecondName('4');

        $customer3
            ->setFirstName('5')
            ->setSecondName('6');

        $this->em->persist($customer1);
        $this->em->persist($customer2);
        $this->em->persist($customer3);

        $this->em->flush();

        $actual = $this->sut->getAllCustomers();

        $this->assertCount(3, $actual);
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     *
     * @throws ORMException
     */
    public function testGetsAllCustomersSortedBySecondNameAscending()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $customer1 = new Customer();
        $customer2 = new Customer();
        $customer3 = new Customer();

        $customer1
            ->setFirstName('a')
            ->setSecondName('b');

        $customer2
            ->setFirstName('c')
            ->setSecondName('d');

        $customer3
            ->setFirstName('e')
            ->setSecondName('f');

        $this->em->persist($customer3);
        $this->em->persist($customer2);
        $this->em->persist($customer1);

        $this->em->flush();

        $actual = $this->sut->getAllCustomersSortedBySecondName(new SortingDirection(SortingDirection::ASC));

        $this->assertCount(3, $actual);

        /** @var Customer $actual0 */
        $actual0 = $actual[0];

        /** @var Customer $actual1 */
        $actual1 = $actual[1];

        /** @var Customer $actual2 */
        $actual2 = $actual[2];

        $this->assertEquals('b', $actual0->getSecondName());
        $this->assertEquals('d', $actual1->getSecondName());
        $this->assertEquals('f', $actual2->getSecondName());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     *
     * @throws ORMException
     */
    public function testGetsAllCustomersSortedBySecondNameDescending()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $customer1 = new Customer();
        $customer2 = new Customer();
        $customer3 = new Customer();

        $customer1
            ->setFirstName('a')
            ->setSecondName('b');

        $customer2
            ->setFirstName('c')
            ->setSecondName('d');

        $customer3
            ->setFirstName('e')
            ->setSecondName('f');

        $this->em->persist($customer1);
        $this->em->persist($customer2);
        $this->em->persist($customer3);

        $this->em->flush();

        $actual = $this->sut->getAllCustomersSortedBySecondName(new SortingDirection(SortingDirection::DESC));

        $this->assertCount(3, $actual);

        /** @var Customer $actual0 */
        $actual0 = $actual[0];

        /** @var Customer $actual1 */
        $actual1 = $actual[1];

        /** @var Customer $actual2 */
        $actual2 = $actual[2];

        $this->assertEquals('f', $actual0->getSecondName());
        $this->assertEquals('d', $actual1->getSecondName());
        $this->assertEquals('b', $actual2->getSecondName());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testItInsertsANewCustomer()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $customer = new Customer();

        $customer
            ->setFirstName('first name')
            ->setSecondName('second name')
            ->setAddress('address')
            ->setTwitterAlias('twitter alias');

        $this->em->persist($customer);

        $this->em->flush();

        $actual = $this->sut->getAllCustomers();

        $this->assertCount(1, $actual);

        /** @var Customer $actual0 */
        $actual0 = $actual[0];

        $this->assertEquals('first name', $actual0->getFirstName());
        $this->assertEquals('second name', $actual0->getSecondName());
        $this->assertEquals('address', $actual0->getAddress());
        $this->assertEquals('twitter alias', $actual0->getTwitterAlias());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @transaction
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testItFindsCustomerById()
    {
        $this->deleteAllRecords(Booking::class);
        $this->deleteAllRecords(Customer::class);

        $customer1 = new Customer();
        $customer2 = new Customer();

        $customer1
            ->setFirstName('first name')
            ->setSecondName('second name')
            ->setAddress('address')
            ->setTwitterAlias('twitter alias');

        $customer2
            ->setFirstName('should not find this')
            ->setSecondName('should not find this')
            ->setAddress('shoud not find this')
            ->setTwitterAlias('should not find this');
        $this->em->persist($customer1);
        $this->em->persist($customer2);

        $this->em->flush();

        $actual = $this->sut->findById($customer1->getId());

        $this->assertEquals('first name', $actual->getFirstName());
        $this->assertEquals('second name', $actual->getSecondName());
        $this->assertEquals('address', $actual->getAddress());
        $this->assertEquals('twitter alias', $actual->getTwitterAlias());
    }
}