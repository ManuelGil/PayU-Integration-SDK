<?php

namespace App;

use Phroute\Phroute\RouteCollector;

class App
{

    function __construct()
    {
        $baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        $baseUrl = 'http://' . $_SERVER['HTTP_HOST'];

        define('BASE_URL', $baseUrl);
    }

    public function run()
    {
        $route = isset($_GET['route']) ? $_GET['route'] : '/';

        $router = new RouteCollector();

        $router->controller('/payments', \App\Controllers\Payments::class);

        $dispatcher = new \Phroute\Phroute\Dispatcher($router->getData());

        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT);
    }

}

?>