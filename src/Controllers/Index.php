<?php

namespace WilliamCurrie\Recruitment\Controllers;

use WilliamCurrie\Recruitment\Exceptions\DatabaseException;
use WilliamCurrie\Recruitment\Exceptions\TemplatingException;
use WilliamCurrie\Recruitment\Models\Bookings;
use WilliamCurrie\Recruitment\Models\Customers;
use WilliamCurrie\Recruitment\Templating\TemplateInterface;
use WilliamCurrie\Recruitment\Helpers\UserFeedback;
use WilliamCurrie\Recruitment\Validators\CustomerValidator;
use WilliamCurrie\Recruitment\ValueObjects\Customer;

class Index
{
    /**
     * @var TemplateInterface
     */
    protected $template;

    /**
     * @var Customers
     */
    protected $customers;

    /**
     * @var Bookings
     */
    protected $bookings;

    /**
     * @var UserFeedback
     */
    protected $feedback;
    /**
     * @var CustomerValidator
     */
    protected $customerValidator;

    /**
     * Index constructor.
     * @param TemplateInterface $template
     * @param UserFeedback $userFeedback
     * @param CustomerValidator $customerValidator
     * @param Customers $customers
     * @param Bookings $bookings
     */
    public function __construct(
        TemplateInterface $template,
        UserFeedback $userFeedback,
        CustomerValidator $customerValidator, // TODO: Replace with ValidatorFactory
        Customers $customers, // TODO: Replace with ModelFactory
        Bookings $bookings // // TODO: Replace with ModelFactory
    ) {
        $this->template = $template;
        $this->feedback = $userFeedback;
        $this->customerValidator = $customerValidator;
        $this->customerValidator->setUserFeedback($userFeedback);
        $this->customers = $customers;
        $this->bookings = $bookings;
    }

    /**
     * Get index page with optional customerId passed in $query if filtering bookings by customer
     * @param array $query usually parameters from $_GET. Optional customerId is used to filter bookings
     * @return string html output to display
     * @throws DatabaseException
     * @throws TemplatingException
     */
    public function get(array $query = []): string
    {
        $customerId = null;

        // Optional customerId used to filter bookings view
        if (array_key_exists('customerId', $query)) {
            if ($this->customerValidator->validateCustomerId($query['customerId'])) {
                $customerId = (int) $query['customerId'];
            }
        }

        $templateVars = [
            'bookings' => $this->bookings->getBookings($customerId),
            'customers' => $this->customers->getAllCustomers(),
            'customersBySurname' => $this->customers->getAllCustomers(true),
            'messages' => $this->feedback->getMessages(),
        ];

        return $this->template->render('index.html.twig', $templateVars);
    }

    // TODO: consider refactor to make postVars arg0
    /**
     * @param array $query usually parameters from $_GET
     * @param array $post usually parameters from $_POST
     * @return string html output to display
     * @throws DatabaseException
     * @throws TemplatingException
     */
    public function post(array $query = [], array $post = []): string
    {
        $customerId = null;

        // Optional customerId used to filter bookings view
        if (array_key_exists('customerId', $query)) {
            if ($this->customerValidator->validateCustomerId($query['customerId'])) {
                $customerId = (int) $query['customerId'];
            }
        }

        if (array_key_exists('first_name', $post) && array_key_exists('second_name', $post)) {
            if ($this->customerValidator->validateName($post['first_name'], $post['second_name'])) {
                // TODO: Consider VO Factory
                $customer = new Customer(); // Value object
                $customer->firstName = trim($post['first_name']);
                $customer->secondName = trim($post['second_name']);

                if ($this->customers->saveCustomer($customer)) {
                    $this->feedback->add(
                        'Customer successfully added to database.',
                        $this->feedback::MESSAGE_TYPE_INFO
                    );
                } else {
                    $this->feedback->add(
                        'Problem while adding customer to database.',
                        $this->feedback::MESSAGE_TYPE_WARN
                    );
                }
            }
        } else {
            $this->feedback->add(
                'First and second name must be included to save new customer.',
                $this->feedback::MESSAGE_TYPE_WARN
            );
        }

        $templateVars = [
            'bookings' => $this->bookings->getBookings($customerId),
            'customers' => $this->customers->getAllCustomers(),
            'customersBySurname' => $this->customers->getAllCustomers(true),
            'messages' => $this->feedback->getMessages(),
        ];

        return $this->template->render('index.html.twig', $templateVars);
    }
}
