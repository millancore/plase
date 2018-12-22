<?php

namespace Plase;

use Plase\Client\PSEClient;
use Plase\Client\PSERequest;
use Plase\Client\PSEResponse;
use Plase\Entity\Transaction;
use Plase\Auth\Authentication;
use Plase\Support\BankFactory;
use Plase\Support\CollectionBank;
use Plase\Transport\SoapTransport;

class PlasePayment
{
    private $auth;
    private $config;
    private $request;
    private $pseClient;
    
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
        $this->setClient();
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

    public function setClient(array $options = [])
    {
        $this->pseClient = new PSEClient(
            new SoapTransport($this->config->wsdl(), $options)
        );

        return $this->pseClient;
    }

    public function getBankList()
    {
        $bankList = $this->pseClient->request(
            'getBankList',
            [
                'auth' => $this->auth->getAuth()
            ]
         );

        $bankFactory = new BankFactory(new CollectionBank());

        return $bankFactory->makefromList($bankList);
    }

    public function createTransaction(PSERequest $request)
    {
        $pseResponse = $this->pseClient->request(
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
        $transaction = $this->pseClient->request(
            'getTransactionInformation',
            [
                'auth' => $this->auth->getAuth(),
                'transactionID' => $transactionID
            ]
        );
     
        return Transaction::fromRawObject($transaction);
    }
}
