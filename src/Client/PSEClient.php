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

    public function getBankList(Auth $auth)
    {
        try {
           $bankList = $this->transport->getBankList(
               ['auth' => $auth->getAuth()]
           );
        } catch (\SoapFault $e) {
            throw $e;
        }

        return $bankList;
    }

    public function createTransaction(Auth $auth, PSERequest $request)
    {
        try {
            $response = $this->transport->createTransaction(
                [
                    'auth' => $auth->getAuth(),
                    'transaction' => $request->toArray()
                ]
            );
        } catch (\SoapFault $e) {
            throw $e;
        }

        return PSEResponse::fromRawObject($response);
    }

    public function getTransactionInformation(Auth $auth, $transactionID)
    {
        try {
            $transaction = $this->transport->createTransaction(
                [
                    'auth' => $auth->getAuth(),
                    'transactionID' => $transactionID
                ]
            );
        } catch (\SoapFault $e) {
            throw $e;
        }

        return PSEResponse::fromRawObject($response);
    }
}
