<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Customer;
use Util\Controller\BaseController;
use Util\Helper\Customer as CustomerHelper;

class PageController extends BaseController
{
    /**
     * @throws \ReflectionException
     */
    public function handleGet()
    {
        $customers = (new Customer)
            ->find();

        $customerIds = [];
        foreach ($customers as $customer) {
            $customerIds[] = $customer->id;
        }

        $bookings = (new Booking)
            ->find('customer_id IN (' . implode(',', $customerIds) . ')');

        $customerNames = [];
        $customerAddresses = [];
        foreach ($customers as $customer) {
            $customerNames[$customer->id] = CustomerHelper::formatCustomerName($customer);
            $customerAddresses[$customer->id] = CustomerHelper::formatCustomerAddress($customer);
        }

        $this->view(
            'page/view',
            [
                'customerNames' => $customerNames,
                'customerAddresses' => $customerAddresses,
                'bookings' => $bookings
            ]
        );

        return null;
    }
}
