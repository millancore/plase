<?php

namespace Plase\Client;

use Plase\Transport\TransportInterface;
use Plase\Auth\Authentication as Auth;

class PSEClient
{
    private $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport->soapClient();
    }

    public function request(String $method, Array $params)
    {
        try {
            $response = $this->transport->__soapCall($method, [$params]);
        } catch (\SoapFault $e) {
            throw $e;
        }

        return $response;
    }
}
