<?php


namespace Controller;

use Model\Enums\SortingDirection;
use Model\Gateway\Customers\UseCase\ApiFormatCustomer;
use Model\Gateway\Customers\UseCase\GetAllCustomers;
use Klein\Response as KResponse;
use Model\Gateway\Customers\UseCase\GetAllCustomersSortedBySecondName;
use Klein\Request as KRequest;
use Model\Gateway\Customers\UseCase\InsertNewCustomerInterface;
use Model\Gateway\Customers\UseCase\MapCustomerPayload;
use Model\Gateway\Customers\UseCase\ValidateCustomerPayloadForPut;
use Model\Helpers\Http\CORSTrait;
use Symfony\Component\HttpFoundation\Response;

class CustomersController
{
    use CORSTrait;
    /**
     * @var GetAllCustomers
     */
    private $getAllCustomers;
    /**
     * @var ApiFormatCustomer
     */
    private $formatCustomerInterface;
    /**
     * @var GetAllCustomersSortedBySecondName
     */
    private $getAllCustomersBySecondName;
    /**
     * @var ValidateCustomerPayloadForPut
     */
    private $validateCustomerPayloadForPut;
    /**
     * @var MapCustomerPayload
     */
    private $mapCustomerPayload;
    /**
     * @var InsertNewCustomerInterface
     */
    private $insertNewCustomer;

    /**
     * CustomersController constructor.
     * @param GetAllCustomers $getAllCustomers
     * @param GetAllCustomersSortedBySecondName $getAllCustomersSortedBySecondName
     * @param ApiFormatCustomer $formatCustomerInterface
     * @param ValidateCustomerPayloadForPut $validateCustomerPayloadForPut
     * @param MapCustomerPayload $mapCustomerPayload
     * @param InsertNewCustomerInterface $insertNewCustomer
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     */
    public function __construct(
        GetAllCustomers $getAllCustomers,
        GetAllCustomersSortedBySecondName $getAllCustomersSortedBySecondName,
        ApiFormatCustomer $formatCustomerInterface,
        ValidateCustomerPayloadForPut $validateCustomerPayloadForPut,
        MapCustomerPayload $mapCustomerPayload,
        InsertNewCustomerInterface $insertNewCustomer
    )
    {
        $this->getAllCustomers = $getAllCustomers;
        $this->formatCustomerInterface = $formatCustomerInterface;
        $this->getAllCustomersBySecondName = $getAllCustomersSortedBySecondName;
        $this->validateCustomerPayloadForPut = $validateCustomerPayloadForPut;
        $this->mapCustomerPayload = $mapCustomerPayload;
        $this->insertNewCustomer = $insertNewCustomer;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param KRequest $request
     * @return KResponse
     */
    public function optionsAction(KRequest $request): KResponse
    {
        $corsHeaders = $this::getCorsHeadersForRequest($request);

        $result = new KResponse(null, Response::HTTP_OK, $corsHeaders);

        return $result;
    }

    /**
     * Gets all customers in the database sorted by second name ascendingly
     * ToDo: extend this to allow any column and any direction to the sorting (hardcoded ascending)
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param KRequest $request
     * @return KResponse
     */
    public function getAllCustomersAction(KRequest $request): KResponse
    {
        $corsHeaders = $this::getCorsHeadersForRequest($request);
        try {
            $customers = $this
                ->getAllCustomersBySecondName
                ->getAllCustomersSortedBySecondName(new SortingDirection(SortingDirection::ASC));

            if (count($customers) === 0) {
                $result = new KResponse([], Response::HTTP_NOT_FOUND, $corsHeaders);
            } else {
                $result = [];

                foreach ($customers as $customer) {
                    $thisCustomer = $this->formatCustomerInterface->formatForGetResponse($customer);
                    $result[] = $thisCustomer;
                }

                $result = new KResponse(json_encode($result), Response::HTTP_OK, $corsHeaders);
            }
        } catch (\Exception $e) {
            $result = new KResponse([], Response::HTTP_INTERNAL_SERVER_ERROR, $corsHeaders);
        }

        return $result;
    }

    /**
     * Inserts a new customer to the database. Compulsory fields are the first and second names
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param KRequest $request
     * @return KResponse
     */
    public function insertNewCustomerAction(KRequest $request): KResponse
    {
        $corsHeaders = $this::getCorsHeadersForRequest($request);

        try {
            $body = json_decode($request->body(), true);

            if (!$body) {
                $result = new KResponse('Empty body request', Response::HTTP_BAD_REQUEST, $corsHeaders);
            } else {
                $payload = $this->mapCustomerPayload->mapFromRequest($body);
                $errors = $this->validateCustomerPayloadForPut->validate($payload);
                if (count($errors) > 0) {
                    $result = new KResponse(implode(', ', $errors), Response::HTTP_UNPROCESSABLE_ENTITY, $corsHeaders);
                } else {
                    $newCustomer = $this->insertNewCustomer->insertNewCustomer($payload);
                    $formatted = $this->formatCustomerInterface->formatForGetResponse($newCustomer);

                    $result = new KResponse(json_encode($formatted), Response::HTTP_CREATED, $corsHeaders);
                }
            }
        } catch (\Exception $e) {
            $result = new KResponse([], Response::HTTP_INTERNAL_SERVER_ERROR, $corsHeaders);
        }

        return $result;
    }
}
