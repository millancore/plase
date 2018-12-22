<?php

namespace Plase\Client;

use Plase\Transport\TransportInterface;
use Plase\Auth\Authentication as Auth;

class PSEClient
{
    private static $instance;
    private $transport;

    protected function __construct(TransportInterface $transport)
    {
        $this->transport = $transport->soapClient();
    }

    public static function getInstance(TransportInterface $transport)
    {
        if (!self::$instance instanceof self) {
            self::$instance = new static($transport);
        }

        return self::$instance;
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
