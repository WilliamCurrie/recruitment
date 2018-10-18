<?php
use App\Domain\Entity\Booking\Booking;
use App\Domain\Entity\Customer\Customer;
use App\Domain\ValueObject\Booking as BookingValueObject;
use App\Domain\ValueObject\Customer as CustomerValueObject;
use App\Infrastructure\Doctrine\Repository\Booking as BookingRepository;
use App\Infrastructure\Doctrine\Repository\Customer as CustomerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

//HOME PAGE
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
})->bind('homepage');

//API
$api = $app['controllers_factory'];

/** @var \Doctrine\ORM\EntityManager $em */
$em = $app['orm.em'];

$findCustomer = function($id) use ($em) {
    /** @var CustomerRepository $repository */
    $repository = $em->getRepository(Customer::class);
    $entity = $repository->find($id);
    return $entity;
};

//List of bookings by a customer
$api->get('/customer/{id}/bookings', function($id) use($em){
    /** @var BookingRepository $repository */
    $repository = $em->getRepository(Booking::class);
    $list = json_encode($repository->findBookingsByCustomerId($id));
    return new JsonResponse(['bookings'=> $list]);
})->bind('api.customers.bookings');

//Add booking to a customer
$api->post('/customer/{id}/booking', function(Request $request, $id) use($em, $findCustomer){
    $customer = $findCustomer($id);
    if ($customer instanceof  Customer) {
        $content = json_decode($request->getContent());
        $valueObject = BookingValueObject::fromJsonAndCustomer(json_encode($content->booking), $customer);
        $entity = Booking::fromValueObject($valueObject);
        $valueObject->id ? $em->merge($entity) : $em->persist($entity);
        $em->flush();
        return new JsonResponse(['booking' => $entity]);
    }
    return new JsonResponse(['error' => 'Customer not found.'], 404);
})->bind('api.customers.bookings.post');

//Delete the booking from a customer
$api->delete('/booking/{id}', function($id) use($em){
    /** @var BookingRepository $repository */
    $repository = $em->getRepository(Booking::class);
    $entity = $repository->find($id);
    if ($entity instanceof Booking) {
        $em->remove($entity);
        $em->flush();
        return new JsonResponse([]);
    }
    return new JsonResponse(['error' => 'Customer not found.'], 404);
})->bind('api.bookings.delete');

//All Customers
$api->get('/customers', function() use($em){
    /** @var CustomerRepository $repository */
    $repository = $em->getRepository(Customer::class);
    $list = json_encode($repository->findAll());
    return new JsonResponse(['customers'=> $list]);
})->bind('api.customers');

//Get Customer.php
$api->get('/customer/{id}', function($id) use($em, $findCustomer){
    $entity = $findCustomer($id);

    if ($entity instanceof  Customer) {
        $customer = json_encode($entity);
        return new JsonResponse(['customer' => $customer]);
    }
    return new JsonResponse(['error' => 'Customer not found.'], 404);
})->bind('api.customer.get');
//Save Customer.php
$api->post('/customer', function(Request $request) use($em){
    $content = json_decode($request->getContent());
    $valueObject = CustomerValueObject::fromJson(json_encode($content->customer));
    $entity = Customer::fromValueObject($valueObject);
    $valueObject->id ? $em->merge($entity) : $em->persist($entity);
    $em->flush();
    return new JsonResponse(['customer'=> $entity]);
})->bind('api.customer.post');
//Delete Customer.php
$api->delete('/customer/{id}', function($id) use($em){
    /** @var CustomerRepository $repository */
    $repository = $em->getRepository(Customer::class);
    $entity = $repository->find($id);
    if (!$entity instanceof Customer) {
        return new JsonResponse(['error' => 'Customer not found.'], 404);
    }
    $em->remove($entity);
    $em->flush();
    return new JsonResponse([]);
})->bind('api.customer.delete');

$app->mount('/api', $api);