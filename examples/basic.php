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

$payer = new Person([

]);

$request = new RequestBuilder();

$transaction = $plase->addTransaction($request)->send();