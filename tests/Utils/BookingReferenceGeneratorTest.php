<?php

namespace App\Tests\Utils;

use App\Utils\BookingReferenceGenerator;
use PHPUnit\Framework\TestCase;

class BookingReferenceGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function generateShouldReturnAValidTextStringAtTheDefaultLength()
    {
        $reference = BookingReferenceGenerator::generate();

        $this->assertTrue(preg_match('/^[0-9A-Z]+$/', $reference) === 1);
        $this->assertTrue(strlen($reference) === BookingReferenceGenerator::DEFAULT_LENGTH);
    }

    /**
     * @test
     */
    public function generateShouldBeRandomWhenCalledConsecutively()
    {
        $results = [];

        for ($x = 0; $x <= 100; $x++) {
            $results[] = BookingReferenceGenerator::generate();
        }

        $this->assertTrue(
            count($results) === count(array_unique($results))
        );

        // validate our previous test with forced duplicates
        $results[] = 'example';
        $results[] = 'example';

        $this->assertFalse(
            count($results) === count(array_unique($results))
        );
    }

    /**
     * @test
     */
    public function generateShouldNotAcceptInvalidLengths()
    {
        $reference = BookingReferenceGenerator::generate(500);
        $this->assertTrue(strlen($reference) === BookingReferenceGenerator::MAX_LENGTH);

        $reference = BookingReferenceGenerator::generate(-30);
        $this->assertTrue(strlen($reference) === BookingReferenceGenerator::MIN_LENGTH);

        $reference = BookingReferenceGenerator::generate(20);
        $this->assertTrue(strlen($reference) === 20);
    }
}
