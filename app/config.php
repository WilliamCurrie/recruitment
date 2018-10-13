<?php
use function DI\create;
use Slim\PDO\Database;

return [
    Database::class => function () {
        $dsn = 'mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE').';post='.getenv('DB_PORT');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        return new Database($dsn, $username, $password, $options);
    },

    Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/Views');
        $twig = new Twig_Environment($loader);
        $message =  new Twig_SimpleFunction('message', function () {
            $meesage = isset($_SESSION['message'])?$_SESSION['message'] : [];
            unset($_SESSION['message']);
            return $meesage;
        });
        $twig->addFunction($message);
        return $twig;
    },
];