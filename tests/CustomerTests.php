<?php

use App\Models\Customer;
use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Email
 */
final class CustomerTests extends TestCase
{
    public function setUp()
    {
        require __DIR__.'/../vendor/autoload.php';
        $dotenv = new Dotenv(__DIR__.'/../');
        $dotenv->load();
    }

    public function testCanGetListOfCustomers()
    {
        $customerQuery = new Customer();
        $customers = $customerQuery->get();
        $this->assertNotEmpty($customers);
    }

    public function testCanGetListOfCustomersOrdered()
    {
        $customerQuery = new Customer();
        $customerQuery->orderBy('DESC', 'first_name');
        $customers = $customerQuery->get();
        $this->assertNotEmpty($customers);
    }

    public function testSaveCustomer()
    {
        $firstName = $this->generateRandomString(5);
        $lastName = $this->generateRandomString(5);

        $customerData = ['first_name' => $firstName, 'second_name' => $lastName];
        $saveCustomer = new Customer();
        $saveCustomer->save($customerData);

        $customer = new Customer();
        $customer->where('first_name', '=', $firstName);
        $customers = $customer->get();

        $this->assertNotEmpty($customers);
    }

    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; ++$i) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
