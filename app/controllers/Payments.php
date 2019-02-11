<?php

namespace App\Controllers;

class Payments
{

    public function postIndex()
    {
        try {
            $referenceCode      =   isset($_POST['referenceCode'])      ?   $_POST['referenceCode']         :   'payment_test_00000001';
            $description        =   isset($_POST['description'])        ?   $_POST['description']           :   'payment test';

            // -- Values --
            $amount             =   isset($_POST['amount'])             ?   $_POST['amount']                :   '10000';
            $tax                =   isset($_POST['tax'])                ?   $_POST['tax']                   :   '0';
            $taxReturnBase      =   isset($_POST['taxReturnBase'])      ?   $_POST['taxReturnBase']         :   '0';
            $currency           =   isset($_POST['currency'])           ?   $_POST['currency']              :   'COP';

            // -- Buyer --
            $buyerName          =   isset($_POST['buyerName'])          ?   $_POST['buyerName']             :   'First name and second buyer name';
            $buyerEmail         =   isset($_POST['buyerEmail'])         ?   $_POST['buyerEmail']            :   'buyer_test@test.com';
            $buyerPhone         =   isset($_POST['buyerPhone'])         ?   $_POST['buyerPhone']            :   '7563126';
            $buyerDocument      =   isset($_POST['buyerDocument'])      ?   $_POST['buyerDocument']         :   '5415668464654';

            // -- Payer --
            $payerName          =   isset($_POST['payerName'])          ?   $_POST['payerName']             :   'First name and second payer name';
            $payerEmail         =   isset($_POST['payerEmail'])         ?   $_POST['payerEmail']            :   'payer_test@test.com';
            $payerPhone         =   isset($_POST['payerPhone'])         ?   $_POST['payerPhone']            :   '7563126';
            $payerDocument      =   isset($_POST['payerDocument'])      ?   $_POST['payerDocument']         :   '5415668464654';

            $shippingAddress    =   isset($_POST['shippingAddress'])    ?   $_POST['shippingAddress']       :   'calle 100';
            $shippingCity       =   isset($_POST['shippingCity'])       ?   $_POST['shippingCity']          :   'Bogota';
            $shippingState      =   isset($_POST['shippingState'])      ?   $_POST['shippingState']         :   'Bogota';
            $shippingCountry    =   isset($_POST['shippingCountry'])    ?   $_POST['shippingCountry']       :   'CO';
            $shippingPostalCode =   isset($_POST['shippingPostalCode']) ?   $_POST['shippingPostalCode']    :   '000000';

            // -- Credit card data --
            $cardNumber         =   isset($_POST['cardNumber'])         ?   $_POST['cardNumber']            :   '4097440000000004';
            $cardExpirationDate =   isset($_POST['cardExpirationDate']) ?   $_POST['cardExpirationDate']    :   '2020/12';
            $cardSecurityCode   =   isset($_POST['cardSecurityCode'])   ?   $_POST['cardSecurityCode']      :   '321';
            $paymentMethod      =   isset($_POST['paymentMethod'])      ?   $_POST['paymentMethod']         :   'VISA';
            $installments       =   isset($_POST['installments'])       ?   $_POST['installments']          :   '1';

            // --To make a credit card payment--
            $parameters = array(
                // Enter the account identifier here.
                \PayUParameters::ACCOUNT_ID                     =>  ACCOUNT_ID,
                // Enter the reference code here.
                \PayUParameters::REFERENCE_CODE                 =>  $referenceCode,
                // Enter the description here.
                \PayUParameters::DESCRIPTION                    =>  $description,

                // -- Values --
                // Enter the value here.
                \PayUParameters::VALUE                          =>  $amount,
                \PayUParameters::TAX_VALUE                      =>  $tax,
                \PayUParameters::TAX_RETURN_BASE                =>  $taxReturnBase,
                // Enter the currency here.
                \PayUParameters::CURRENCY                       =>  $currency,

                // -- Buyer --
                // Enter the name of the buyer here.
                \PayUParameters::BUYER_NAME                     =>  $buyerName,
                // Enter the email of the buyer here.
                \PayUParameters::BUYER_EMAIL                    =>  $buyerEmail,
                // Enter the telephone number of the buyer here.
                \PayUParameters::BUYER_CONTACT_PHONE            =>  $buyerPhone,
                // Enter the contact document of the buyer here.
                \PayUParameters::BUYER_DNI                      =>  $buyerDocument,
                // Enter the address of the buyer here.
                \PayUParameters::BUYER_STREET                   =>  $shippingAddress,
                \PayUParameters::BUYER_CITY                     =>  $shippingCity,
                \PayUParameters::BUYER_STATE                    =>  $shippingState,
                \PayUParameters::BUYER_COUNTRY                  =>  $shippingCountry,
                \PayUParameters::BUYER_POSTAL_CODE              =>  $shippingPostalCode,
                \PayUParameters::BUYER_PHONE                    =>  $buyerPhone,

                // -- Payer --
                // Enter the name of the payer here.
                \PayUParameters::PAYER_NAME                     =>  "APPROVED",
                // Enter the email of the payer here.
                \PayUParameters::PAYER_EMAIL                    =>  $payerEmail,
                // Enter the telephone number of the payer here.
                \PayUParameters::PAYER_CONTACT_PHONE            =>  $payerPhone,
                // Enter the contact document of the payer here.
                \PayUParameters::PAYER_DNI                      =>  $payerDocument,
                // Enter the address of the payer here.
                \PayUParameters::PAYER_STREET                   =>  $shippingAddress,
                \PayUParameters::PAYER_CITY                     =>  $shippingCity,
                \PayUParameters::PAYER_STATE                    =>  $shippingState,
                \PayUParameters::PAYER_COUNTRY                  =>  $shippingCountry,
                \PayUParameters::PAYER_POSTAL_CODE              =>  $shippingPostalCode,
                \PayUParameters::PAYER_PHONE                    =>  $payerPhone,

                // -- Credit card data --
                // Enter the number of credit card here
                \PayUParameters::CREDIT_CARD_NUMBER             =>  $cardNumber,
                // Enter the expiration date of the credit card here
                \PayUParameters::CREDIT_CARD_EXPIRATION_DATE    =>  $cardExpirationDate,
                // Enter the security code of the credit card here
                \PayUParameters::CREDIT_CARD_SECURITY_CODE      =>  $cardSecurityCode,
                // Enter the credit card name here. 
                // VISA||MASTERCARD||AMEX||DINERS
                \PayUParameters::PAYMENT_METHOD                 =>  $paymentMethod,

                // Enter the number of installments here.
                \PayUParameters::INSTALLMENTS_NUMBER            =>  $installments,
                // Enter the name of the country here.
                \PayUParameters::COUNTRY                        =>  \PayUCountries::CO,

                // Session id of the device.
                \PayUParameters::DEVICE_SESSION_ID              =>  \App\Utils\Util::get_device_session_ID(),
                // IP of the payer
                \PayUParameters::IP_ADDRESS                     =>  \App\Utils\Util::get_ip_address(),
                // Cookie of the current session.
                \PayUParameters::PAYER_COOKIE                   =>  "pt1t38347bs6jc9ruv2ecpv7o2",
                // Cookie of the current session.        
                \PayUParameters::USER_AGENT                     =>  \App\Utils\Util::get_user_agent()
            );

            // Authorization and capture request
            $response = \PayUPayments::doAuthorizationAndCapture($parameters);

            // --  You can obtain the properties in the response --
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
                
                return $response;
            }
        } catch (\Exception $e) {
            \App\Log::logError($e->getMessage());
        }
    }

}

?>
