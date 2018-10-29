<?php

class BookingEntityTest extends \PHPUnit\Framework\TestCase
{
    public function testHydrate()
    {
        /** @var \App\Entity\Booking $entity */
        $entity = new \App\Entity\Booking();

        $data = [
            'reference' => '11dsf3',
            'date' => '1/1/2018',
            'customer_id' => 1,
            'id' => 999,
        ];

        $booking = $entity::hydrate($data);

        $this->assertInstanceOf(\App\Entity\Booking::class, $booking);
    }

    public function testHydrateException()
    {
        $this->expectException(\Core\Error\MissingEntityDetailException::class);

        /** @var \App\Entity\Booking $entity */
        $entity = new \App\Entity\Booking();

        $data = [
            'first_name' => 'John',
        ];

        $entity::hydrate($data);
    }
}