<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['root.dir'] = realpath(__DIR__ . '/..');

/******DEBUG*******/
$app['debug'] = true;
/******DEBUG*******/

/** VIEWS */
$app->register(
    new Silex\Provider\TwigServiceProvider(),
    [
        'twig.path' => $app['root.dir'] . '/src/UI/Views',
    ]
);
/** /VIEWS */

require $app['root.dir'] . '/src/Infrastructure/Service/service.php';
require $app['root.dir'] . '/src/UI/Controllers/controllers.php';

$app->run();
