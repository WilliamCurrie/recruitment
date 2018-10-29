<?php

class CustomerEntityTest extends \PHPUnit\Framework\TestCase
{
    public function testFormattedName()
    {
        $entity = new \App\Entity\Customer();
        $entity->setFirstName('John')
            ->setLastName('Smith');

        $this->assertEquals('John Smith', $entity->getFormattedName());
    }
}