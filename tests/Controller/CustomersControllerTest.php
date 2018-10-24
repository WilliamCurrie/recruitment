<?php


namespace Tests\Controller;


use Controller\CustomersController;
use Exception;
use Klein\Request as KRequest;
use Model\Entity\Customer;
use Model\Gateway\Customers\UseCase\ApiFormatCustomer;
use Model\Gateway\Customers\UseCase\GetAllCustomers;
use Model\Gateway\Customers\UseCase\GetAllCustomersSortedBySecondName;
use Model\Gateway\Customers\UseCase\InsertNewCustomerInterface;
use Model\Gateway\Customers\UseCase\MapCustomerPayload;
use Model\Gateway\Customers\UseCase\ValidateCustomerPayloadForPut;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class CustomersControllerTest extends TestCase
{
    /**
     * @var CustomersController
     */
    private $sut;
    /**
     * @var GetAllCustomers|MockObject
     */
    private $getAllCustomers;
    /**
     * @var GetAllCustomersSortedBySecondName|MockObject
     */
    private $getAllCustomersSortedBySecondName;
    /**
     * @var ApiFormatCustomer|MockObject
     */
    private $apiFormatCustomer;
    /**
     * @var ValidateCustomerPayloadForPut|MockObject
     */
    private $validateCustomerPayloadForPut;
    /**
     * @var MapCustomerPayload|MockObject
     */
    private $mapCustomerPayload;
    /**
     * @var InsertNewCustomerInterface|MockObject
     */
    private $insertNewCustomerInterface;

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function setUp()
    {
        parent::setUp();

        $this->getAllCustomers = $this->createMock(GetAllCustomers::class);
        $this->getAllCustomersSortedBySecondName = $this->createMock(GetAllCustomersSortedBySecondName::class);
        $this->apiFormatCustomer = $this->createMock(ApiFormatCustomer::class);
        $this->validateCustomerPayloadForPut = $this->createMock(ValidateCustomerPayloadForPut::class);
        $this->mapCustomerPayload = $this->createMock(MapCustomerPayload::class);
        $this->insertNewCustomerInterface = $this->createMock(InsertNewCustomerInterface::class);

        $this->sut = new CustomersController(
            $this->getAllCustomers,
            $this->getAllCustomersSortedBySecondName,
            $this->apiFormatCustomer,
            $this->validateCustomerPayloadForPut,
            $this->mapCustomerPayload,
            $this->insertNewCustomerInterface
        );
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsInternalServerErrorWhenGettingAllCustomers()
    {
        $this->getAllCustomersSortedBySecondName
            ->expects($this->once())
            ->method('getAllCustomersSortedBySecondName')
            ->willThrowException(new Exception('Hey Ya'));

        $requestFixture = new KRequest();
        $actual = $this->sut->getAllCustomersAction($requestFixture);

        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $actual->status()->getCode());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsNotFoundIfNoCustomersInDatabase()
    {
        $this->getAllCustomersSortedBySecondName
            ->expects($this->once())
            ->method('getAllCustomersSortedBySecondName')
            ->willReturn([]);

        $requestFixture = new KRequest();
        $actual = $this->sut->getAllCustomersAction($requestFixture);

        $this->assertEquals(Response::HTTP_NOT_FOUND, $actual->status()->getCode());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsCorrectResultWhenThereIsAtLeastOneCustomerInDatabase()
    {
        $customer = new Customer();
        $customer
            ->setFirstName('first name')
            ->setSecondName('second name')
            ->setAddress('address')
            ->setTwitterAlias('twitter alias');

        $this->getAllCustomersSortedBySecondName
            ->expects($this->once())
            ->method('getAllCustomersSortedBySecondName')
            ->willReturn([$customer])
        ;

        $this->apiFormatCustomer->expects($this->once())->method('formatForGetResponse')->willReturn(['hey' => 'ya']);

        $requestFixture = new KRequest();
        $actual = $this->sut->getAllCustomersAction($requestFixture);

        $this->assertEquals(Response::HTTP_OK, $actual->status()->getCode());
        $expectedBody = '[{"hey":"ya"}]';

        $this->assertEquals($expectedBody, $actual->body());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsInternalServerErrorWhenInserting()
    {
        $this->mapCustomerPayload
            ->expects($this->once())
            ->method('mapFromRequest')
            ->willThrowException(new Exception('Hey ya'))
        ;

        $requestFixture = new KRequest([], [], [], [], [], json_encode(['test' => 'blah']));
        $actual = $this->sut->insertNewCustomerAction($requestFixture);

        $this->assertEquals(Response::HTTP_INTERNAL_SERVER_ERROR, $actual->status()->getCode());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsUnprocessableEntityIfIncorrectPayload()
    {
        $requestFixture = new KRequest([], [], [], [], [], json_encode(['test' => 'blah']));


        $this->validateCustomerPayloadForPut
            ->expects($this->once())
            ->method('validate')
            ->willReturn(['error 1', 'error 2'])
        ;

        $actual = $this->sut->insertNewCustomerAction($requestFixture);
        $this->assertEquals(Response::HTTP_UNPROCESSABLE_ENTITY, $actual->status()->getCode());
        $expectedBody = 'error 1, error 2';

        $this->assertEquals($expectedBody, $actual->body());
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function testReturnsCorrectResponseIfEverythingIsOk()
    {
        $requestFixture = new KRequest([], [], [], [], [], json_encode(['test' => 'blah']));


        $this->validateCustomerPayloadForPut
            ->expects($this->once())
            ->method('validate')
            ->willReturn([])
        ;

        $actual = $this->sut->insertNewCustomerAction($requestFixture);
        $this->assertEquals(Response::HTTP_CREATED, $actual->status()->getCode());
    }
}
