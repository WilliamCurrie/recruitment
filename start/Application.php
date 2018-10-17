<?php

namespace Start;

use Database\DBMSAdapter;
use Dotenv\Dotenv;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Util\Controller\BaseController;

class Application
{
    /**
     * @var array
     */
    public static $container;

    /**
     * @return void
     */
    public static function bootstrap()
    {
        (new Dotenv(self::getRootDir()))
            ->load();
    }

    /**
     * @return string
     */
    public static function getRootDir()
    {
        return dirname(__DIR__);
    }

    /**
     * @return void
     */
    public static function setDBMSConnection()
    {
        $dbmsAdapter = getenv('DBMS_ADAPTER');
        $dbmsConfig = [
            getenv($dbmsAdapter . '_HOST'),
            getenv($dbmsAdapter . '_USERNAME'),
            getenv($dbmsAdapter . '_PASSWORD'),
            getenv($dbmsAdapter . '_DB_NAME'),
        ];

        $dbmsAdapterClass = 'Database\\' . ucwords(strtolower($dbmsAdapter)) . 'Adapter';

        /** @var DBMSAdapter $instance */
        $instance = new $dbmsAdapterClass($dbmsConfig);

        $instance->connect();
        static::$container['DB_adapter'] = $instance;
    }

    /**
     * @return void
     */
    public static function unsetDBMSConnection()
    {
        if (isset(static::$container['DB_adapter'])) {
            static::$container['DB_adapter']->disconnect();
        }
    }

    public static function run()
    {
        static::setViewEngine();
        if (!array_key_exists($_SERVER['REQUEST_URI'], Routes::$collection)) {
            http_response_code(404);
            echo static::$container['twig']->render('notfound/404.html');

            static::unsetContainer();
            return null;
        }

        static::setDBMSConnection();

        $controller = new Routes::$collection[$_SERVER['REQUEST_URI']]['controller'];
        if (!method_exists($controller, Routes::$collection[$_SERVER['REQUEST_URI']]['method'])) {
            throw new \RuntimeException('400, Method not allowed.');
        }

        // This is done for convenience.
        // Maybe we could include additional details etc.
        BaseController::$request = [
            'server' => &$_SERVER,
            'getArgs' => &$_GET,
            'postArgs' => &$_POST,
        ];

        $controller->{Routes::$collection[$_SERVER['REQUEST_URI']]['method']}();

        static::unsetDBMSConnection();
        static::unsetContainer();
    }

    public static function unsetContainer()
    {
        static::$container = null;
    }

    public static function setViewEngine()
    {
        static::$container['twig'] = new Twig_Environment(
            new Twig_Loader_Filesystem(self::getRootDir() . '/resource/template/'),
            [
                'cache' => false,
            ]
        );
    }
}
