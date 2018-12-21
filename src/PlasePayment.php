<?php

namespace Plase;

use Plase\Client\PSEClient;
use Plase\Client\PSERequest;
use Plase\Transport\SoapTransport;
use Plase\Auth\Authentication;

class PlasePayment
{ 
    private $pseClient;
    private $request;
    private $config;
    private $auth;

    public function __construct(ConfigInterface $config)
    { 
        $this->transaction = null;
        $this->config = $config;
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

    public function auth()
    {
        return $this->auth;
    }

    public function addTransaction(PSERequest $request)
    {
        $this->request = $request;
        return $this;
    }

    public function send()
    {
        if ($this->request == null) {
            throw new \InvalidArgumentException('Request can\'t be null');
        }

        $pseResponse = $this->client()->createTransaction(
            $this->auth,
            $this->request
        );

        return $pseResponse;
    }

    public function client(Array $options = [])
    {
        $this->pseClient = PSEClient::getInstance(
            new SoapTransport($this->config->wsdl(), $options)
        );

        return $this->pseClient;
    }
}
