<?php

namespace Plase\Client;

class PSEResponse
{
    private $transactionID;
    private $sessionID;
    private $returnCode;
    private $trazabilityCode;
    private $transactionCycle;
    private $bankCurrency;
    private $bankFactor;
    private $bankURL;
    private $responseCode;
    private $responseReasonCode;
    private $responseReasonText;

    public function __construct(Array $data)
    {
        foreach ($data as $propierty => $value) {
            $this->{$propierty} = $value;
        }
    }

    public static function fromRawObject($rawObjectResponse)
    {
        $data = $rawObjectResponse->createTransactionResult;
        return new static(get_object_vars($data));
    }

    public function transactionID()
    { 
        return $this->transactionID;
    }

    public function sessionID()
    {
        return $this->sessionID;
    }
    
    public function returnCode()
    { 
        return $this->returnCode;
    }

    public function trazabilityCode()
    {
       return $this->trazabilityCode;
    }

    public function bankCurrency()
    {
        return $this->bankCurrency; 
    }
    
    public function bankFactor()
    {
        return $this->bankFactor;
    }

    public function bankURL()
    {
        return $this->bankURL;
    }

    public function responseCode()
    {
        return $this->responseCode;
    }

    public function responseReasonCode()
    {
        return $this->responseReasonCode;
    }

    public function responseReasonText()
    {
        return $this->responseReasonText;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}