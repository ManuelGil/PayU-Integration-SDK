<?php

namespace App;

use Phroute\Phroute\RouteCollector;

class App
{

    function __construct()
    {
        \PayU::$apiKey          =   API_KEY;
        \PayU::$apiLogin        =   API_LOGIN;
        \PayU::$merchantId      =   MERCHANT_ID;
        \PayU::$language        =   \SupportedLanguages::EN; // Enter the language you prefer here.
        \PayU::$isTest          =   DEBUG; // Leave it true when testing.

        \Environment::setPaymentsCustomUrl(PAYMENTS_URL);
        \Environment::setReportsCustomUrl(QUERIES_URL);
        \Environment::setSubscriptionsCustomUrl(SUBSCRIPTIONS_URL);
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