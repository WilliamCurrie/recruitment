<?php

namespace WilliamCurrie\Recruitment;

use PDO;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use WilliamCurrie\Recruitment\Controllers\Index;
use WilliamCurrie\Recruitment\Exceptions\DatabaseException;
use WilliamCurrie\Recruitment\Exceptions\TemplatingException;
use WilliamCurrie\Recruitment\Exceptions\UnexpectedRequestMethodException;
use WilliamCurrie\Recruitment\Exceptions\UriNotFoundException;
use WilliamCurrie\Recruitment\Helpers\UserFeedback;
use WilliamCurrie\Recruitment\Models\Bookings;
use WilliamCurrie\Recruitment\Models\Customers;
use WilliamCurrie\Recruitment\Templating\TemplateInterface;
use WilliamCurrie\Recruitment\Templating\TwigDecorator;
use WilliamCurrie\Recruitment\Validators\CustomerValidator;

/**
 * Class App
 *
 * Encapsulate's the application and reduces risk of code leak from a mis-configured web server by removing as much as
 * possible from the public directory. The Nginx container does not have file access to the src directory or project
 * root.
 *
 * @package WilliamCurrie\Recruitment
 */
class App
{
    protected $controller;

    /**
     * App constructor.
     * Initialise the application. As this is a simple app, I've used 'simple-by-default' whilst still
     * allowing dependency injection for unit testing etc. In a larger app the factory pattern, auto wiring and
     * lazy-loading may be used.
     *
     * @param null|Config $config
     * @param null|PDO $pdo
     * @param null|TemplateInterface $template
     * @param null|CustomerValidator $customerValidator
     * @param UserFeedback|null $userFeedback
     * @param null|Customers $customers
     * @param null|Bookings $bookings
     * @param null|Index $controller
     */
    public function __construct(
        ?Config $config = null,
        ?PDO $pdo = null,
        ?TemplateInterface $template = null,
        ?CustomerValidator $customerValidator = null,
        ?UserFeedback $userFeedback = null,
        ?Customers $customers = null, // TODO: replace with ModelFactory
        ?Bookings $bookings = null, // TODO: replace with ModelFactory
        ?Index $controller = null
    ) {
        if (is_null($config)) {
            $config = new Config();
        }

        if (is_null($pdo)) {
            $pdo = new PDO(
                $config->getDsn(),
                $config->getDbUsername(),
                $config->getDbPassword(),
                $config->getPdoOptions()
            );
        }

        if (is_null($customerValidator)) {
            $customerValidator = new CustomerValidator();
        }

        if (is_null($customers)) {
            $customers = new Customers($pdo);
        }

        if (is_null($template)) {
            $templateLoader = new FilesystemLoader($config->getTemplateDir());
            $template = new TwigDecorator(new Environment($templateLoader));
        }

        if (is_null($bookings)) {
            $bookings = new Bookings($pdo);
        }

        if (is_null($userFeedback)) {
            $userFeedback = new UserFeedback();
        }

        if (is_null($controller)) {
            $this->controller = new Index($template, $userFeedback, $customerValidator, $customers, $bookings);
        }
    }

    /**
     * Run the application
     * @param array $globals Contains _GET _POST _SERVER globals or equivalent
     * @return string response to be returned to the user
     * @throws DatabaseException
     * @throws TemplatingException
     */
    public function run(array $globals): string
    {
        switch (parse_url($globals['_SERVER']['REQUEST_URI'], PHP_URL_PATH)) {
            case '/':
                $response = $this->handleIndexRequest($globals);
                break;
            default:
                throw new UriNotFoundException();
        }

        return $response;
    }

    /**
     * @param array $globals containing $_GET $_POST _$SERVER etc
     * @return string text based output for http response
     * @throws DatabaseException
     * @throws TemplatingException
     */
    public function handleIndexRequest(array $globals): string
    {
        switch ($globals['_SERVER']['REQUEST_METHOD']) {
            case 'GET':
                $response = $this->controller->get($_GET);
                break;
            case 'POST':
                $response = $this->controller->post($_GET, $_POST);
                break;
            default:
                throw new UnexpectedRequestMethodException();
        }

        return $response;
    }
}
