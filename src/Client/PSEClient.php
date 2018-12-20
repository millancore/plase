<?php

namespace Plase\Client;

use Plase\Transport\TransportInterface;

class PSEClient
{
    private $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    public function getBankList(Auth $auth)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function createTransaction(Auth $auth, PSERequest $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }

        return new PSEResponse($response);
    }


    public function createTransactionMultiCredit(Auth $auth, PSERequest $request)
    {
        return new PSEResponse($response);
    }

    public function getTransactionInformation(Auth $auth, Transaction $transaction)
    {

        // Info
        return new PSEResponse($response);
    }
}
