<?php

include __DIR__ . '/../vendor/autoload.php';

PayU::$apiKey       =   API_KEY;
PayU::$apiLogin     =   API_LOGIN;
PayU::$merchantId   =   MERCHANT_ID;
PayU::$language     =   SupportedLanguages::ES; // Seleccione el idioma.
PayU::$isTest       =   true; // Dejarlo True cuando sean pruebas.

//  Pruebas ---------------------------------
// URL de Pagos
Environment::setPaymentsCustomUrl("https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi");
// URL de Consultas
Environment::setReportsCustomUrl("https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi");
// URL de Suscripciones para Pagos Recurrentes
Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.3/");

//  Producción ---------------------------------
// URL de Pagos
//  Environment::setPaymentsCustomUrl("https:// api.payulatam.com/payments-api/4.0/service.cgi");
// URL de Consultas
//  Environment::setReportsCustomUrl("https:// api.payulatam.com/reports-api/4.0/service.cgi");
// URL de Suscripciones para Pagos Recurrentes
//  Environment::setSubscriptionsCustomUrl("https:// api.payulatam.com/payments-api/rest/v4.3/"); 

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $accountId          =   ACCOUNT_ID;

        $referenceCode      =   isset($_POST['referenceCode'])      ?   $_POST['referenceCode']         :   '00000001';
        $description        =   isset($_POST['description'])        ?   $_POST['description']           :   '';

        // -- Valores --
        $amount             =   isset($_POST['amount'])             ?   $_POST['amount']                :   '0';
        $currency           =   isset($_POST['currency'])           ?   $_POST['currency']              :   'COP';

        // -- Comprador --
        $buyerName          =   isset($_POST['buyerName'])          ?   $_POST['buyerName']             :   '';
        $buyerEmail         =   isset($_POST['buyerEmail'])         ?   $_POST['buyerEmail']            :   '';
        $buyerPhone         =   isset($_POST['buyerPhone'])         ?   $_POST['buyerPhone']            :   '';
        $buyerDocument      =   isset($_POST['buyerDocument'])      ?   $_POST['buyerDocument']         :   '';
        
        $shippingAddress    =   isset($_POST['shippingAddress'])    ?   $_POST['shippingAddress']       :   '';
        $shippingCity       =   isset($_POST['shippingCity'])       ?   $_POST['shippingCity']          :   '';
        $shippingState      =   isset($_POST['shippingState'])      ?   $_POST['shippingState']         :   '';
        $shippingCountry    =   isset($_POST['shippingCountry'])    ?   $_POST['shippingCountry']       :   '';
        $shippingPostalCode =   isset($_POST['shippingPostalCode']) ?   $_POST['shippingPostalCode']    :   '';

        // -- Datos de la tarjeta de crédito -- 
        $cardNumber         =   isset($_POST['cardNumber'])         ?   $_POST['cardNumber']            :   '';
        $cardExpirationDate =   isset($_POST['cardExpirationDate']) ?   $_POST['cardExpirationDate']    :   '';
        $cardSecurityCode   =   isset($_POST['cardSecurityCode'])   ?   $_POST['cardSecurityCode']      :   '';

        $paymentMethod      =   isset($_POST['paymentMethod'])      ?   $_POST['paymentMethod']         :   'VISA';
        $installments       =   isset($_POST['installments'])       ?   $_POST['installments']          :   '36';

        // Para realizar un pago con tarjeta de crédito ---------------------------------
        $parameters = array(
            // Ingrese aquí el identificador de la cuenta.
            PayUParameters::ACCOUNT_ID                  =>  $accountId,
            // Ingrese aquí el código de referencia.
            PayUParameters::REFERENCE_CODE              =>  $referenceCode,
            // Ingrese aquí la descripción.
            PayUParameters::DESCRIPTION                 =>  $description,

            // -- Valores --
            // Ingrese aquí el valor.        
            PayUParameters::VALUE                       =>  $amount,
            //Ingrese aquí el valor del IVA (Impuesto al Valor Agregado solo valido para Colombia) de la transacción,
            //si se envía el IVA nulo el sistema aplicará el 19% automáticamente. Puede contener dos dígitos decimales.
            //Ej: 19000.00. En caso de no tener IVA debe enviarse en 0.
            PayUParameters::TAX_VALUE                   =>  "0",
            //Ingrese aquí el valor base sobre el cual se calcula el IVA (solo valido para Colombia).
            //En caso de que no tenga IVA debe enviarse en 0.
            PayUParameters::TAX_RETURN_BASE             =>  "0",
            // Ingrese aquí la moneda.
            PayUParameters::CURRENCY                    =>  $currency,

            // -- Comprador --
            // Ingrese aquí el nombre del comprador.
            PayUParameters::BUYER_NAME                  =>  $buyerName,
            // Ingrese aquí el email del comprador.
            PayUParameters::BUYER_EMAIL                 =>  $buyerEmail,
            // Ingrese aquí el teléfono de contacto del comprador.
            PayUParameters::BUYER_CONTACT_PHONE         =>  $buyerPhone,
            // Ingrese aquí el documento de contacto del comprador.
            PayUParameters::BUYER_DNI                   =>  $buyerDocument,
            // Ingrese aquí la dirección del comprador.
            PayUParameters::BUYER_STREET                =>  $shippingAddress,
            PayUParameters::BUYER_CITY                  =>  $shippingCity,
            PayUParameters::BUYER_STATE                 =>  $shippingState,
            PayUParameters::BUYER_COUNTRY               =>  $shippingCountry,
            PayUParameters::BUYER_POSTAL_CODE           =>  $shippingPostalCode,
            PayUParameters::BUYER_PHONE                 =>  $buyerPhone,

            // -- pagador --
            // Ingrese aquí el nombre del pagador.
            PayUParameters::PAYER_NAME                  =>  "APPROVED",
            // Ingrese aquí el email del pagador.
            PayUParameters::PAYER_EMAIL                 =>  $buyerEmail,
            // Ingrese aquí el teléfono de contacto del pagador.
            PayUParameters::PAYER_CONTACT_PHONE         =>  $buyerPhone,
            // Ingrese aquí el documento de contacto del pagador.
            PayUParameters::PAYER_DNI                   =>  $buyerDocument,
            // Ingrese aquí la dirección del pagador.
            PayUParameters::PAYER_STREET                =>  $shippingAddress,
            PayUParameters::PAYER_CITY                  =>  $shippingCity,
            PayUParameters::PAYER_STATE                 =>  $shippingState,
            PayUParameters::PAYER_COUNTRY               =>  $shippingCountry,
            PayUParameters::PAYER_POSTAL_CODE           =>  $shippingPostalCode,
            PayUParameters::PAYER_PHONE                 =>  $buyerPhone,

            // -- Datos de la tarjeta de crédito -- 
            // Ingrese aquí el número de la tarjeta de crédito
            PayUParameters::CREDIT_CARD_NUMBER          =>  $cardNumber,
            // Ingrese aquí la fecha de vencimiento de la tarjeta de crédito
            PayUParameters::CREDIT_CARD_EXPIRATION_DATE =>  $cardExpirationDate,
            // Ingrese aquí el código de seguridad de la tarjeta de crédito
            PayUParameters::CREDIT_CARD_SECURITY_CODE   =>  $cardSecurityCode,
            // Ingrese aquí el nombre de la tarjeta de crédito
            // VISA||MASTERCARD||AMEX||DINERS
            PayUParameters::PAYMENT_METHOD              =>  $paymentMethod,

            // Ingrese aquí el número de cuotas.
            PayUParameters::INSTALLMENTS_NUMBER         =>  $installments,
            // Ingrese aquí el nombre del pais.
            PayUParameters::COUNTRY                     =>  PayUCountries::CO,

            // Session id del device.
            PayUParameters::DEVICE_SESSION_ID           =>  get_device_session_ID(),
            // IP del pagadador
            PayUParameters::IP_ADDRESS                  =>  get_ip_address(),
            //Cookie de la sesión actual.
            PayUParameters::PAYER_COOKIE                =>  "pt1t38347bs6jc9ruv2ecpv7o2",
            // Cookie de la sesión actual.        
            PayUParameters::USER_AGENT                  =>  get_user_agent()
        );

        // solicitud de autorización y captura
        $response = PayUPayments::doAuthorizationAndCapture($parameters);

        if ($response) {
            $response->transactionResponse->orderId;
            $response->transactionResponse->transactionId;
            $response->transactionResponse->state;
            if ($response->transactionResponse->state == "PENDING") {
                $response->transactionResponse->pendingReason;
            }
            $response->transactionResponse->paymentNetworkResponseCode;
            $response->transactionResponse->paymentNetworkResponseErrorMessage;
            $response->transactionResponse->trazabilityCode;
            $response->transactionResponse->responseCode;
            $response->transactionResponse->responseMessage;
            echo json_encode($response);
        }
    } else {
        $data['status'] = "OK";
        echo json_encode($data);
    }
} catch (\Exception $e) {
    error_log("[" . date("Y-m-d H:i:s") . "] - Error: \n\t" . $e->getMessage(), 3, __DIR__ . '/logs/app.log');
}

function get_ip_address()
{
    $ip     =   '';

    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip     =   $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip     =   $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ip     =   $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ip     =   $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ip     =   $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];
    } else {
        $ip     =   'UNKNOWN';
    }

    return $ip;
}

function get_device_session_ID()
{
    return md5(session_id() . microtime());
}

function get_user_agent()
{
    return $_SERVER['HTTP_USER_AGENT'];
}

?>