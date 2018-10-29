<?php

class CustomerEntityTest extends \PHPUnit\Framework\TestCase
{
    public function testFormattedName()
    {
        /** @var \App\Entity\Customer $entity */
        $entity = new \App\Entity\Customer();
        $entity->setFirstName('John')
            ->setLastName('Smith');

        $this->assertEquals('John Smith', $entity->getFormattedName());
    }

    public function testHydrate()
    {
        /** @var \App\Entity\Customer $entity */
        $entity = new \App\Entity\Customer();

        $data = [
            'first_name' => 'John',
            'last_name' => 'Smith',
            'address' => '1 address rd',
            'id' => 999,
        ];

        $customer = $entity::hydrate($data);

        $this->assertInstanceOf(\App\Entity\Customer::class, $customer);
    }
}