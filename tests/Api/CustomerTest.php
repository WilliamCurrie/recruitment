<?php
namespace Tests\Api;

use GuzzleHttp\Exception\ServerException;

class CustomerTest extends ApiTestAbstract {

    protected $exampleCustomer = [
        'customer' => [
            'first_name'  => 'Sergio',
            'second_name' => 'Lopez',
            'address'     => 'Earth'
        ]
    ];


    public function testGetCustomers()
    {
        /** @var \GuzzleHttp\Psr7\Response $response */
        $response = $this->http->request('GET', 'customers');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
    }


    public function testAddCustomer()
    {
        /** @var \GuzzleHttp\Psr7\Response $response */
        $response = $this->http->post('customer', ['json' => $this->exampleCustomer]);

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);
    }


    /**
     * @depends testAddCustomer
     */
    public function testAddedCustomers()
    {
        /** @var \GuzzleHttp\Psr7\Response $response */
        $response = $this->http->request('GET', 'customers');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json", $contentType);

        $data = json_decode($response->getBody());
        $customers = json_decode($data->customers);
        $lastAdded = array_pop($customers);

        $this->assertAttributeEquals(
            $this->exampleCustomer['customer']['first_name'],
            'first_name',
            $lastAdded,
            'Last customer was not the expected'
        );
    }
}
