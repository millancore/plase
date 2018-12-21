<?php

namespace Plase;

use Plase\Client\PSEClient;
use Plase\Transport\SoapTransport;
use Plase\Auth\Authentication;

class PlasePayment
{ 
    private $pseClient;
    private $auth;

    public function __construct(ConfigInterface $config)
    { 
        $this->setAuth($config);
    }

    public static function fromConfig(Array $config)
    {
        return new self(Config::set($config));
    }

    public function setAuth($config)
    {
        $this->auth = new Authentication(
            $config->login(),
            $config->tranKey()
        );
    }

    public function addTransaction(Transaction $transaction)
    {
        return $this;
    }

    public function client()
    {
        $this->pseClient = new PSEClient(
            new SoapTransport($config->wsdl(), []),
            $this->auth
        );

        return $this->pseClient;
    }
}
