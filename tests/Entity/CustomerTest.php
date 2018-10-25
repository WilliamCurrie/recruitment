<?php

namespace App\Tests\Entity;

use App\Entity\Customer;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class CustomerTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProviderForEnsureDefaultsAreSetOnObjectInstantiation
     */
    public function ensureDefaultsAreSetOnObjectInstantiation(string $firstName, string $secondName)
    {
        $customer = new Customer($firstName, $secondName);

        $this->assertTrue(Uuid::isValid($customer->getId()));
        $this->assertEquals($firstName, $customer->getFirstName());
        $this->assertEquals($secondName, $customer->getSecondName());
        $this->assertEquals(ArrayCollection::class, get_class($customer->getBookings()));
    }

    public function dataProviderForEnsureDefaultsAreSetOnObjectInstantiation()
    {
        return [
            [
                'Josh',
                'Freeman'
            ],
            [
                'Fred',
                'Flimpstone'
            ],
            [
                123,
                5.67
            ],
        ];
    }

    /**
     * @test
     * @expectedException \TypeError
     */
    public function nullDataShouldThrowException()
    {
        new Customer(null, null);
    }
}
