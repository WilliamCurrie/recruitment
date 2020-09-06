<?php
/**
 * Just somewhere temporary to put defines/includes etc for the moment (till namespacing) - Kev Porter, 20200906
 */
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_PORT', getenv('DB_PORT'));

define('ENVIRONMENT', getenv('ENVIRONMENT'));

define('BASE_DIR', '..');
define('SRC_DIR', BASE_DIR.'/src');

/**
 * @todo Make sure this is only displaying exception message in dev mode
 */
set_exception_handler(function (\Exception $e) {
    if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
        echo "<p>EXCEPTION: ".$e->getMessage()." </p>";
    } else {
        echo "<p>Oops, something went wrong.</p>";
    }
});

spl_autoload_register(function ($className) {

    $filename = SRC_DIR.DIRECTORY_SEPARATOR.str_replace("\\", "/", $className) . '.php';
    if (!file_exists($filename)) {
        throw new \RuntimeException("Couldn't load file '{$filename}'");
    }

    require_once $filename;
});

