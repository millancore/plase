<?php

namespace Plase\Entity;

use Plase\Support\OptionsValidatorTrait;

class Transaction
{
    use OptionsValidatorTrait;

    private $transactionID;
    private $sessionID;
    private $reference;
    private $requestDate;
    private $bankProcessDate;
    private $onTest;
    private $returnCode;
    private $trazabilityCode;
    private $transactionCycle;
    private $transactionState;
    private $responseCode;
    private $responseReasonCode;
    private $responseReasonText;

    public function __construct(Array $data)
    {
        $validData = $this->validateData($data);

        foreach ($validData as $propierty => $value) {
            $this->{$propierty} = $value;
        }
    }

    public static function fromRawObject($rawObjectResponse)
    {
        $data = $rawObjectResponse->getTransactionInformationResult;
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

    public function reference()
    {
        return $this->reference;
    }

    public function requestDate()
    {
        return $this->requestDate;
    }

    public function bankProcessDate()
    {
        return $this->bankProcessDate;
    }

    public function onTest()
    {
        return $this->onTest;
    }

    public function returnCode()
    {
        return $this->returnCode;
    }

    public function trazabilityCode()
    {
        return $this->trazabilityCode;
    }

    public function transactionCycle()
    {
        return $this->transactionCycle;
    }

    public function transactionState()
    { 
        return $this->transactionState;
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
