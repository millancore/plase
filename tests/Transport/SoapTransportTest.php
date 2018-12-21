<?php

include 'vendor/autoload.php';

use Plase\Transport\SoapTransport;

$transport = new SoapTransport('http://localhost/soapServer/server.php?wsdl', []);
$transport->send('Hola!');