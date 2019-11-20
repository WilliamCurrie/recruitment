<?php

namespace WilliamCurrie\Tests\Controllers;

use PHPUnit\Framework\TestCase;
use WilliamCurrie\Recruitment\Controllers\Index;
use WilliamCurrie\Recruitment\Helpers\UserFeedback;
use WilliamCurrie\Recruitment\Models\Bookings;
use WilliamCurrie\Recruitment\Models\Customers;
use WilliamCurrie\Recruitment\Templating\TemplateInterface;
use WilliamCurrie\Recruitment\Validators\CustomerValidator;

final class TestIndex extends TestCase
{
    /** @var TemplateInterface  */
    protected $mockTemplate;

    /** @var UserFeedback */
    protected $mockFeedback;

    /** @var CustomerValidator */
    protected $mockValidator;

    /** @var Customers */
    protected $mockCustomers;

    /** @var Bookings */
    protected $mockBookings;

    /**
     * @var Index
     */
    protected $indexController;

    public function setUp()
    {
        $this->mockTemplate = $this->createMock(TemplateInterface::class);
        $this->mockFeedback = $this->createMock(UserFeedback::class);
        $this->mockValidator = $this->createMock(CustomerValidator::class);
        $this->mockCustomers = $this->createMock(Customers::class);
        $this->mockBookings = $this->createMock(Bookings::class);

        $this->indexController = new Index(
            $this->mockTemplate,
            $this->mockFeedback,
            $this->mockValidator,
            $this->mockCustomers,
            $this->mockBookings
        );
    }

    public function testGetValidatesCustomerIdIfPresent()
    {
        $customerId = '1';
        $customerIdInt = 1;

        $this->mockValidator
             ->expects($this->exactly(2))
             ->method('validateCustomerId')
             ->withConsecutive([$customerId], [$customerIdInt])
             ->willReturn(true);

        $this->indexController->get(['customerId' => '1']);
        $this->indexController->get(['customerId' => 1]);
        $this->indexController->get();
    }

    public function testPostValidatesCustomerIdIfPresent()
    {
        $customerId = '1';
        $customerIdInt = 1;

        $this->mockValidator
            ->expects($this->exactly(2))
            ->method('validateCustomerId')
            ->withConsecutive([$customerId], [$customerIdInt])
            ->willReturn(true);

        $this->indexController->post(['customerId' => '1']);
        $this->indexController->post(['customerId' => 1]);
        $this->indexController->post();
    }

    public function testPostValidatesCustomerName()
    {
        $firstName = 'Fred';
        $secondName = 'White';

        $this->mockValidator
            ->expects($this->exactly(1))
            ->method('validateName')
            ->with($firstName, $secondName)
            ->willReturn(true);

        $this->indexController->post([], ['first_name' => $firstName, 'second_name' => $secondName]);
    }

    public function testGetSendUserMessagesToTemplate()
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [
                ['msg' => 'Value given for customerId must be an integer.', 'msg_class' => 'warn'],
            ],
        ];

        $this->mockFeedback
            ->expects($this->once())
            ->method('getMessages')
            ->willReturn($templateVars['messages']);

        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->indexController->get(['customerId' => 'test']);
    }

    public function testPostSendsUserMessagesToTemplate()
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [
                ['msg' => 'Customer successfully added to database.', 'msg_class' => 'info']
            ],
        ];

        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->mockFeedback
            ->expects($this->once())
            ->method('getMessages')
            ->willReturn($templateVars['messages']);

        $this->indexController->post([], ['first_name' => 'John', 'second_name' => 'Walker']);
    }

    public function testGetWarnsOnNonNumericCustomerId(): void
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [
                ['msg' => 'Value given for customerId must be an integer.', 'msg_class' => 'warn'],
            ],
        ];

        $this->mockFeedback
            ->expects($this->once())
            ->method('getMessages')
            ->willReturn($templateVars['messages']);

        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->indexController->get(['customerId' => 'test']);
    }

    public function testGetAllowsNumericStringCustomerId(): void
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [],
        ];

        $this->mockTemplate
            ->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->indexController->get(['customerId' => '1']);
    }

    public function testGetAllowsIntegerCustomerId(): void
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [],
        ];

        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->indexController->get(['customerId' => 1]);
    }

    public function testGetPassesCustomerListToTemplate()
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [
                ['id' => 1, 'first_name' => 'John', 'last_name' => 'Walker']
            ],
            'customersBySurname' => [
                ['id' => 1, 'first_name' => 'John', 'last_name' => 'Walker']
            ],
            'messages' => [],
        ];
        
        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->mockCustomers->expects($this->exactly(2))
            ->method('getAllCustomers')
            ->willReturn($templateVars['customers']);
        
        $this->indexController->get(['customerId' => 1]);
    }

    public function testGetPassesOrderedCustomerListToTemplate()
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [
                ['id' => 1, 'first_name' => 'John', 'last_name' => 'Walker'],
                ['id' => 2, 'first_name' => 'John', 'last_name' => 'Smith'],
            ],
            'customersBySurname' => [
                ['id' => 2, 'first_name' => 'John', 'last_name' => 'Smith'],
                ['id' => 1, 'first_name' => 'John', 'last_name' => 'Walker'],
            ],
            'messages' => [],
        ];

        $this->mockTemplate
            ->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->mockCustomers
            ->expects($this->exactly(2))
            ->method('getAllCustomers')
            ->willReturnOnConsecutiveCalls($templateVars['customers'], $templateVars['customersBySurname']);

        $this->indexController->get(['customerId' => 1]);
    }

    public function testGetPassesBookingListToTemplate()
    {
        $bookings = [
            [
                'booking_reference' => 'JE122',
                'first_name' => 'John',
                'second_name' => 'Walker',
                'booking_date' => '2019-01-01 11:11:11'
            ]
        ];
        
        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->willReturn('test');

        $this->mockBookings->expects($this->once())
            ->method('getBookings')
            ->willReturn($bookings);

        $this->indexController->get(['customerId' => 1]);
    }

    public function testPostConfirmsCustomerSave()
    {
        $firstName = '';
        $secondName = '';

        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [
                ['msg' => 'Customer successfully added to database.', 'msg_class' => 'info']
            ],
        ];

        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->mockValidator
             ->method('validateName')
             ->with($firstName, $secondName)
             ->willReturn(true);

        $this->mockCustomers->expects($this->once())
            ->method('saveCustomer')
            ->willReturn(true);

        $this->mockFeedback
            ->expects($this->once())
            ->method('add')
            ->with($templateVars['messages'][0]['msg'], 1)
            ->willReturn(true);

        $this->mockFeedback
            ->expects($this->once())
            ->method('getMessages')
            ->willReturn($templateVars['messages']);

        $this->indexController->post([], ['first_name' => $firstName, 'second_name' => $secondName]);
    }

    public function testPostWarnsOnMissingCustomerName()
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [
                ['msg' => 'First and second name must be included to save new customer.', 'msg_class' => 'warn']
            ],
        ];

        $this->mockFeedback
            ->expects($this->once())
            ->method('add')
            ->with($templateVars['messages'][0]['msg'], 2)
            ->willReturn(true);

        $this->mockFeedback
            ->expects($this->once())
            ->method('getMessages')
            ->willReturn($templateVars['messages']);

        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->indexController->post([], []);
    }

    public function testPostWarnsOnMissingCustomerFirstName()
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [
                ['msg' => 'First and second name must be included to save new customer.', 'msg_class' => 'warn']
            ],
        ];

        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->mockFeedback
            ->expects($this->once())
            ->method('add')
            ->with($templateVars['messages'][0]['msg'], 2)
            ->willReturn(true);

        $this->mockFeedback
            ->expects($this->once())
            ->method('getMessages')
            ->willReturn($templateVars['messages']);

        $this->indexController->post([], ['second_name' => 'Walker']);
    }

    public function testPostWarnsOnMissingCustomerSecondName()
    {
        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [
                ['msg' => 'First and second name must be included to save new customer.', 'msg_class' => 'warn']
            ],
        ];

        $this->mockTemplate->expects($this->once())
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->mockFeedback
            ->expects($this->once())
            ->method('add')
            ->with($templateVars['messages'][0]['msg'], 2)
            ->willReturn(true);

        $this->mockFeedback
            ->expects($this->once())
            ->method('getMessages')
            ->willReturn($templateVars['messages']);

        $this->indexController->post([], ['first_name' => 'John']);
    }

    public function testPostWarnsOnSaveError()
    {
        $firstName = 'Fred';
        $secondName = 'Patric-Smith';

        $templateVars = [
            'bookings' => [],
            'customers' => [],
            'customersBySurname' => [],
            'messages' => [
                ['msg' => 'Problem while adding customer to database.', 'msg_class' => 'warn']
            ],
        ];

        $this->mockTemplate->expects($this->exactly(1))
            ->method('render')
            ->with('index.html.twig', $templateVars)
            ->willReturn('test');

        $this->mockValidator
            ->expects($this->exactly(1))
            ->method('validateName')
            ->with($firstName, $secondName)
            ->willReturn(true);

        $this->mockCustomers->expects($this->exactly(1))
            ->method('saveCustomer')
            ->willReturn(false);

        $this->mockFeedback
            ->expects($this->exactly(1))
            ->method('add')
            ->with($templateVars['messages'][0]['msg'], 2)
            ->willReturn(true);

        $this->mockFeedback
            ->expects($this->exactly(1))
            ->method('getMessages')
            ->willReturn($templateVars['messages']);

        $this->indexController->post([], ['first_name' => $firstName, 'second_name' => $secondName]);
    }
}
