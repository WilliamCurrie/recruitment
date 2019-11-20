<?php

declare(strict_types=1);

use WilliamCurrie\Recruitment\App;
use WilliamCurrie\Recruitment\Exceptions\UnexpectedRequestMethodException;
use WilliamCurrie\Recruitment\Exceptions\UriNotFoundException;

$composerAutoloader = __DIR__ . '/../vendor/autoload.php';

// This would not be used in real world code it's just here to explain thing's if first page load is before composer
// installs dependencies.
// A build pipeline would normally ensure dependencies were in place pre-deploy
if (!file_exists($composerAutoloader)) {
    $message = '[wranx-dev-test] Dependencies not yet installed. ';
    $message .= 'Please try again after the composer service has completed installation and exited (0).';
    exit($message);
}

try {
    require_once $composerAutoloader;

    $app = new App();

    $globals = [
        '_GET' => $_GET,
        '_POST' => $_POST,
        '_SERVER' => $_SERVER
    ];

    echo $app->run($globals);
} catch (UriNotFoundException $e) {
    http_response_code(404);
    echo "Page not found.";
} catch (UnexpectedRequestMethodException $e) {
    http_response_code(405);
    echo "Method not allowed.";
} catch (Exception $e) {
    // Provide a non-leaky message to the users.
    echo 'Sorry, there seems to be a problem with the app right now.';
    echo 'Please contact support or try again in a few minutes.';

    echo "<br>[wranx-dev-test] If this is the first run, mysql may not be ready.";

    // TODO: Log exceptions
}
