<?php

namespace Plase;

use Plase\Client\PSEClient;
use Plase\Client\PSERequest;
use Plase\Client\PSEResponse;
use Plase\Entity\Transaction;
use Plase\Auth\Authentication;
use Plase\Transport\SoapTransport;

class PlasePayment
{
    private $auth;
    private $config;
    private $request;
    private $pseClient;
    
    public function __construct(ConfigInterface $config)
    {
        $this->transaction = null;
        $this->config = $config;
        $this->setAuth($config);
    }

    public static function fromConfig(array $config)
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

    public function client(array $options = [])
    {
        $this->pseClient = PSEClient::getInstance(
            new SoapTransport($this->config->wsdl(), $options)
        );

        return $this->pseClient;
    }

    public function getBankList()
    {
        $bankList = $this->client()->request(
            'getBankList',
            [
                'auth' => $this->auth->getAuth()
            ]
         );

        return $bankList;
    }

    public function createTransaction(PSERequest $request)
    {
        $pseResponse = $this->client()->request(
            'createTransaction',
            [
                'auth' => $this->auth->getAuth(),
                'transaction' => $request->toArray()
            ]
         );
         
        return PSEResponse::fromRawObject($pseResponse);
    }

    public function getTransaction($transactionID)
    {
        $transaction = $this->client()->request(
            'getTransactionInformation',
            [
                'auth' => $this->auth->getAuth(),
                'transactionID' => $transactionID
            ]
        );
     
        return Transaction::fromRawObject($transaction);
    }
}
