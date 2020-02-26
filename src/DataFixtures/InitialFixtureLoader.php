<?php

namespace App\DataFixtures;

use App\Entities\Booking;
use App\Entities\Customer;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InitialFixtureLoader implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $customer1 = new Customer();
        $customer1->setFirstName('Jim')
            ->setSurname('Edwards')
            ->setAddress('23 Where I live, Liverpool, L1 3TF');

        $manager->persist($customer1);

        $booking1 = new Booking();
        $booking1->setCustomer($customer1)
            ->setReference('JE122')
            ->setBookingDate(new \DateTime('2017-01-01'));

        $manager->persist($booking1);

        $booking2 = new Booking();
        $booking2->setCustomer($customer1)
            ->setReference('JE125')
            ->setBookingDate(new \DateTime('2017-03-02'));

        $manager->persist($booking2);

        $customer2 = new Customer();
        $customer2->setFirstName('Dave')
            ->setSurname('Maher')
            ->setAddress('24 My House, Manchester, M1 3TF');

        $manager->persist($customer2);

        $customer3 = new Customer();
        $customer3->setFirstName('Susan')
            ->setSurname('Lewis')
            ->setAddress('25 Skelmer Road, London, LN1 3TF');

        $manager->persist($customer3);

        $customer4 = new Customer();
        $customer4->setFirstName('Lorraine')
            ->setSurname('Taylor')
            ->setAddress('26 Palm Avenue, Newcastle, N1 3TF');

        $manager->persist($customer4);

        $booking3 = new Booking();
        $booking3->setCustomer($customer4)
            ->setReference('LT478')
            ->setBookingDate(new \DateTime('2017-02-15'));

        $manager->persist($booking3);

        $booking4 = new Booking();
        $booking4->setCustomer($customer4)
            ->setReference('LT791')
            ->setBookingDate(new \DateTime('2017-04-01'));

        $manager->persist($booking4);

        $manager->flush();
    }
}
