<?php

namespace Plase\Client;

use Plase\Transport\TransportInterface;
use Plase\Auth\Authentication;

class PSEClient
{
    private $transport;
    private $auth;

    public function __construct(
        TransportInterface $transport,
        Authentication $auth
    )
    {
        $this->transport = $transport->client();
        $this->auth = $auth;
    }

    public function getBankList()
    {
        try {
           $bankList = $this->transport->getBankList(
               ['auth' => $this->auth->getAuth()]
           );
        } catch (\SoapFault $e) {
            throw $e;
        }

        return $bankList;
    }

    public function createTransaction(PSERequest $request)
    {
        try {
            $transaction = $this->transport->createTransaction(
                [
                    'auth' => $this->auth->getAuth(),
                    'transaction' => $request->toArray()
                ]
            );

        } catch (\SoapFault $e) {
            throw $e;
        }

        return $transaction;
    }

    public function getTransactionInformation(Transaction $transaction)
    {

        // Info
        return new PSEResponse($response);
    }
}
