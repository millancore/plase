<?php

namespace Plase;

use Plase\Client\PSEClient;
use Plase\Transport\SoapTransport;
use Plase\Auth\Authentication;

class Plase
{ 
    private $pseClient;
    private $auth;

    public function __construct(Config $config)
    { 
        $this->auth = new Authentication(
            $config->login(),
            $config->tranKey()
        );

        $this->pseClient = new PSEClient(
            new SoapTransport($config->wsdl(), []),
            $this->auth
        );
    }

    public static function createFromConfig(Config $config)
    {
        return new self($config);
    }

    public function setAuth()
    {

    }

    public function send(Transaction $transaction)
    {

    }

    public function client()
    {
        return $this->pseClient;
    }
}
