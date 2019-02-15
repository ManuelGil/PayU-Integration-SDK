<?php

include __DIR__ . '/../vendor/autoload.php';

if (DEBUG) {
    error_reporting(-1);
    ini_set('display_errors', 1);
} else {
    if (version_compare(PHP_VERSION, '5.3', '>=')) {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
    } else {
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
    }
}

$app = new \App\App;

$app->run();

?>