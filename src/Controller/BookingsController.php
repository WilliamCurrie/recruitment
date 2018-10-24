<?php


namespace Controller;

use Klein\Response as KResponse;
use Model\Gateway\Bookings\UseCase\ApiFormatBooking;
use Model\Gateway\Bookings\UseCase\GetAllBookings;
use Model\Gateway\Bookings\UseCase\GetBookingsByCustomerId;
use Model\Gateway\Customers\UseCase\GetCustomerById;
use Model\Helpers\Http\CORSTrait;
use Symfony\Component\HttpFoundation\Response;
use Klein\Request as KRequest;

class BookingsController
{
    use CORSTrait;
    /**
     * @var GetCustomerById
     */
    private $getCustomerById;
    /**
     * @var GetBookingsByCustomerId
     */
    private $getBookingsByCustomerId;
    /**
     * @var ApiFormatBooking
     */
    private $apiFormatBooking;
    /**
     * @var GetAllBookings
     */
    private $getAllBookings;

    /**
     * BookingsController constructor.
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param GetCustomerById $getCustomerById
     * @param GetBookingsByCustomerId $getBookingsByCustomerId
     * @param ApiFormatBooking $apiFormatBooking
     * @param GetAllBookings $getAllBookings
     */
    public function __construct(
        GetCustomerById $getCustomerById,
        GetBookingsByCustomerId $getBookingsByCustomerId,
        ApiFormatBooking $apiFormatBooking,
        GetAllBookings $getAllBookings
    )
    {
        $this->getCustomerById = $getCustomerById;
        $this->getBookingsByCustomerId = $getBookingsByCustomerId;
        $this->apiFormatBooking = $apiFormatBooking;
        $this->getAllBookings = $getAllBookings;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param KRequest $request
     * @return KResponse
     */
    public function getBookingsByCustomerIdAction(KRequest $request): KResponse
    {

        $corsHeaders = self::getCorsHeadersForRequest($request);
        try {
            $paramsNamed = $request->paramsNamed();
            $customerId = $paramsNamed->get('customerId');
            // First, check if the client actually exists
            $customer = $this->getCustomerById->findById($customerId);

            if (!$customer) {
                $result = new KResponse([], Response::HTTP_NOT_FOUND, $corsHeaders);
            } else {
                $bookings = $this->getBookingsByCustomerId->getBookingsByCustomerId($customerId);

                if (count($bookings) === 0) {
                    $result = new KResponse([], Response::HTTP_NOT_FOUND, $corsHeaders);
                } else {

                    $formattedBookings = [];
                    foreach ($bookings as $booking) {
                        $thisBooking = $this->apiFormatBooking->formatBookingForGetResponse($booking);
                        $formattedBookings[] = $thisBooking;
                    }

                    $result = new KResponse(json_encode($formattedBookings), Response::HTTP_OK, $corsHeaders);
                }
            }
        } catch (\Exception $e) {
            $result = new KResponse([], Response::HTTP_INTERNAL_SERVER_ERROR, $corsHeaders);
        }

        return $result;
    }

    /**
     * @author Nicky Santamaria <nicky.web.001@gmail.com>
     * @param KRequest $request
     * @return KResponse
     */
    public function getAllBookingsAction(KRequest $request): KResponse
    {
        $corsHeaders = self::getCorsHeadersForRequest($request);

        try {
            $bookings = $this->getAllBookings->getAllBookings();

            if (count($bookings) === 0) {
                // No bookings
                $result = new KResponse([], Response::HTTP_NOT_FOUND, $corsHeaders);
            } else {

                $formattedBookings = [];

                foreach ($bookings as $booking) {
                    $thisBooking = $this->apiFormatBooking->formatBookingForGetResponse($booking);
                    $formattedBookings[] = $thisBooking;
                }

                $result = new KResponse(json_encode($formattedBookings), Response::HTTP_OK, $corsHeaders);
            }
        } catch(\Exception $e) {
            $result = new KResponse([], Response::HTTP_INTERNAL_SERVER_ERROR, $corsHeaders);
        }

        return $result;
    }
}
