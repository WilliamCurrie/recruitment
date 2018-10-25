<?php

namespace App\Tests\Service\Customers;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use App\Service\Customers\Customers;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class CustomersTest extends TestCase
{
    /** @var Customers */
    private $sut;
    /** @var EntityManagerInterface */
    private $em;

    public function setUp()
    {
        parent::setUp();

        // mock our repo
        $repo = $this->createMock(CustomerRepository::class);

        // mock em
        $em = $this->createMock(EntityManagerInterface::class);
        $em->expects($this->any())
            ->method('getRepository')
            ->willReturn($repo);

        $this->em = $em;
        $this->sut = new Customers($em);
    }

    /**
     * @test
     */
    public function saveShouldCallPersistAndFlush()
    {
        $this->em->expects($this->once())->method('persist');
        $this->em->expects($this->once())->method('flush');

        $customer = new Customer('Josh', 'Freeman');

        $this->sut->save($customer);
    }
}
