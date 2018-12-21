<?php

include_once 'vendor/autoload.php';

use Plase\PlasePayment;
use Plase\RequestBuilder;
use Plase\Entity\Person;

$plase = PlasePayment::fromConfig([
    'login' => '6dd490faf9cb87a9862245da41170ff2',
    'tranKey' => '024h1IlD',
    'wsdl' => 'https://test.placetopay.com/soap/pse/?wsdl',
    'location' => 'https://test.placetopay.com/soap/pse'
]);

$payer = $buyer = new Person([
    'document' => 548794703,
    'documentType' => 'SSN',
    'firstName' => 'Sonny',
    'lastName' => 'Stokes',
    'company' => 'Prosacco, Feeney and Nitzsche',
    'emailAddress' => 'trystan60@service.com',
    'address' => '42895 Kirlin Prairie Apt. 538 North Lulamouth',
    'city' => 'East Jeremyville',
    'province' => 'Texas',
    'country' => 'SA',
    'phone' => '888-5127-93540',
    'mobile' => '212-474-4638-541',
]);

$shipping = new Person([
    'document' => 312423122,
    'documentType' => 'CC',
    'firstName' => 'Rafal',
    'lastName' => 'Kastone',
    'company' => 'Atelco',
    'emailAddress' => 'neodine@service.com',
    'address' => '42895 Kirlin Prairie Apt. 538 North Lulamouth',
    'city' => 'East Jeremyville',
    'province' => 'Texas',
    'country' => 'SA',
    'phone' => '888-5127-93540',
    'mobile' => '212-474-4638-541',
]);

$builder = new RequestBuilder([
    'bankCode' => 1022,
    'bankInterface' => 0,
    'returnURL' => 'https://returnpayment.com/payment',
    'reference' => 1232312,
    'description' => 'Ut enim dicta fugit. Enim ut minima fugiat',
    'language' => 'EN',
    'currency' => 'USD',
    'totalAmount' => 1021231,
    'taxAmount' => 2132.15,
    'devolutionBase' => 1851.41,
    'tipAmount' => 1232.95,
    'payer' => $payer,
    'buyer' => $buyer,
    'shipping' => $shipping,
    'ipAddress' => '37.49.34.76',
    'userAgent' => 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/5311 (KHTML, like Gecko) Chrome/37.0.862.0 Mobile Safari/5311',
    'additionalData' => ['name' => 'code', 'value' => 312321]
]);

$pseResponse = $plase->addTransaction($builder->request())->send();

var_dump($pseResponse);