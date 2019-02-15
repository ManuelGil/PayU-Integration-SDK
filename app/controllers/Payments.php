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
            $amount             =   isset($_POST['amount'])             ?   $_POST['amount']                :   '20000';
            $tax                =   isset($_POST['tax'])                ?   $_POST['tax']                   :   '3193';
            $taxReturnBase      =   isset($_POST['taxReturnBase'])      ?   $_POST['taxReturnBase']         :   '16806';
            $currency           =   isset($_POST['currency'])           ?   $_POST['currency']              :   'COP';

            // -- Buyer --
            $buyerName          =   isset($_POST['buyerName'])          ?   $_POST['buyerName']             :   'First name and second buyer name';
            $buyerEmail         =   isset($_POST['buyerEmail'])         ?   $_POST['buyerEmail']            :   'buyer_test@test.com';
            $buyerPhone         =   isset($_POST['buyerPhone'])         ?   $_POST['buyerPhone']            :   '7563126';
            $buyerDocument      =   isset($_POST['buyerDocument'])      ?   $_POST['buyerDocument']         :   '5415668464654';

            // -- Payer --
            $payerName          =   isset($_POST['payerName'])          ?   $_POST['payerName']             :   'APPROVED';
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
                // Enter the account’s identifier here.
                \PayUParameters::ACCOUNT_ID                     =>  ACCOUNT_ID,
                // Enter the reference code here.
                \PayUParameters::REFERENCE_CODE                 =>  $referenceCode,
                // Enter the description here.
                \PayUParameters::DESCRIPTION                    =>  $description,

                // -- Values --
                // Enter the value here.
                \PayUParameters::VALUE                          =>  $amount,
                // Enter the value of the VAT (Value Added Tax only valid for Colombia) of the transaction,
                // if no VAT is sent, the system will apply 19% automatically. It can contain two decimal digits.
                // Example 19000.00. In case you have no VAT you should fill out 0.
                \PayUParameters::TAX_VALUE                      =>  $tax,
                // Enter the value of the base value on which VAT (only valid for Colombia) is calculated.
                // If you do not have VAT should be sent to 0.
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
                \PayUParameters::PAYER_NAME                     =>  $payerName,
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
                // Enter the number of credit card here.
                \PayUParameters::CREDIT_CARD_NUMBER             =>  $cardNumber,
                // Enter the expiration date of the credit card here.
                \PayUParameters::CREDIT_CARD_EXPIRATION_DATE    =>  $cardExpirationDate,
                // Enter the security code of the credit card here.
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
                // IP of the payer.
                \PayUParameters::IP_ADDRESS                     =>  \App\Utils\Util::get_ip_address(),
                // Cookie of the current session.
                \PayUParameters::PAYER_COOKIE                   =>  "pt1t38347bs6jc9ruv2ecpv7o2",
                // Cookie of the current session.        
                \PayUParameters::USER_AGENT                     =>  \App\Utils\Util::get_user_agent()
            );

            // Authorization and capture request.
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
            }

            return $response;
        } catch (\Exception $e) {
            \App\Log::logError($e->getMessage());
        }
    }

    public function getBanks()
    {
        try {
            // Enter the payment method name here.
            $parameters = array(
	            // Insert  the payment method here.
                \PayUParameters::PAYMENT_METHOD                 =>  "PSE",
	            // Enter the name of the country here.
                \PayUParameters::COUNTRY                        =>  \PayUCountries::CO,
            );

            $array = \PayUPayments::getPSEBanks($parameters);
            $banks = $array->banks;

            $response = array();

            foreach ($banks as $bank) {
                $obj = new \stdClass();
                $obj->bank = $bank->description;
                $obj->code = $bank->pseCode;

                $response[] = $bank;
            }

            return $response;
        } catch (\Exception $e) {
            \App\Log::logError($e->getMessage());
        }
    }

    public function postPse()
    {
        try {
            $referenceCode      =   isset($_POST['referenceCode'])      ?   $_POST['referenceCode']         :   'payment_test_00000001';
            $description        =   isset($_POST['description'])        ?   $_POST['description']           :   'payment test';

            // -- Values --
            $amount             =   isset($_POST['amount'])             ?   $_POST['amount']                :   '20000';
            $tax                =   isset($_POST['tax'])                ?   $_POST['tax']                   :   '3193';
            $taxReturnBase      =   isset($_POST['taxReturnBase'])      ?   $_POST['taxReturnBase']         :   '16806';
            $currency           =   isset($_POST['currency'])           ?   $_POST['currency']              :   'COP';

            // -- Buyer --
            $buyerEmail         =   isset($_POST['buyerEmail'])         ?   $_POST['buyerEmail']            :   'buyer_test@test.com';

            // -- Payer --
            $payerName          =   isset($_POST['payerName'])          ?   $_POST['payerName']             :   'First name and second payer name';
            $payerEmail         =   isset($_POST['payerEmail'])         ?   $_POST['payerEmail']            :   'payer_test@test.com';
            $payerPhone         =   isset($_POST['payerPhone'])         ?   $_POST['payerPhone']            :   '7563126';
            $payerDocument      =   isset($_POST['payerDocument'])      ?   $_POST['payerDocument']         :   '123456789';
            $payerDocumentType  =   isset($_POST['payerDocumentType'])  ?   $_POST['payerDocumentType']     :   'CC';

            // -- Mandatory information for PSE –-
            $pseBank            =   isset($_POST['pseBank'])            ?   $_POST['pseBank']               :   '1007';
            $personType         =   isset($_POST['personType'])         ?   $_POST['personType']            :   'N';

            $parameters = array(
	            // Enter the account’s identifier here.
                \PayUParameters::ACCOUNT_ID                     =>  ACCOUNT_ID,
	            // Enter the reference code here.
                \PayUParameters::REFERENCE_CODE                 =>  $referenceCode,
	            // Enter the description here.
                \PayUParameters::DESCRIPTION                    =>  $description,

	            // -- Values --
                // Enter the value here.
                \PayUParameters::VALUE                          =>  $amount,
                // Enter the value of the VAT (Value Added Tax only valid for Colombia) of the transaction,
                // if no VAT is sent, the system will apply 19% automatically. It can contain two decimal digits.
                // Example 19000.00. In case you have no VAT you should fill out 0.
                \PayUParameters::TAX_VALUE                      =>  $tax,
                // Enter the value of the base value on which VAT (only valid for Colombia) is calculated.
                // If you do not have VAT should be sent to 0.
                \PayUParameters::TAX_RETURN_BASE                =>  $taxReturnBase,
	            // Enter the currency here.
                \PayUParameters::CURRENCY                       =>  $currency,

	            // Enter the buyer's email here.
                \PayUParameters::BUYER_EMAIL                    =>  $buyerEmail,
	            // Enter the payer's name here.
                \PayUParameters::PAYER_NAME                     =>  $payerName,
	            // Enter the payer's email here.
                \PayUParameters::PAYER_EMAIL                    =>  $payerEmail,
	            // Enter the payer's contact phone here.
                \PayUParameters::PAYER_CONTACT_PHONE            =>  $payerPhone,

	            // -- Mandatory information for PSE –-
                // Enter the bank PSE code here.
                \PayUParameters::PSE_FINANCIAL_INSTITUTION_CODE =>  $pseBank,
	            // Enter the person type here (Natural or legal).
                \PayUParameters::PAYER_PERSON_TYPE              =>  $personType,
	            // Enter the payer's contact document here.
                \PayUParameters::PAYER_DNI                      =>  $payerDocument,
	            // Enter the payer’s document type here: CC, CE, NIT, TI, PP,IDC, CEL, RC, DE.
                \PayUParameters::PAYER_DOCUMENT_TYPE            =>  $payerDocumentType,

	            // Enter the payment method name here.
                \PayUParameters::PAYMENT_METHOD                 =>  "PSE",

	            // Enter the name of the country here.
                \PayUParameters::COUNTRY                        =>  \PayUCountries::CO,

	            // Payer IP.
                \PayUParameters::IP_ADDRESS                     =>  \App\Utils\Util::get_ip_address(),
                // User agent of the current session.
                \PayUParameters::PAYER_COOKIE                   =>  "pt1t38347bs6jc9ruv2ecpv7o2",
                // User agent of the current session.
                \PayUParameters::USER_AGENT                     =>  \App\Utils\Util::get_user_agent(),

	            // Response page to which the payer will be redirected.
                \PayUParameters::RESPONSE_URL                   =>  "http://www.test.com/response"
            );

            $response = \PayUPayments::doAuthorizationAndCapture($parameters);

            if ($response) {
                $response->transactionResponse->orderId;
                $response->transactionResponse->transactionId;
                $response->transactionResponse->state;
                if ($response->transactionResponse->state)
                    if ($response->transactionResponse->state == "PENDING") {
                    $response->transactionResponse->pendingReason;
                    $response->transactionResponse->extraParameters->BANK_URL;
                }
                $response->transactionResponse->responseCode;
            }

            return $response;
        } catch (\Throwable $e) {
            \App\Log::logError($e->getMessage());
        }
    }

}

?>
