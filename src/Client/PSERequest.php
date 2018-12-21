<?php

namespace Plase\Client;

use Plase\RequestBuilder;

class PSERequest
{
    private $bankCode;
    private $bankInterface;
    private $returnURL;
    private $reference;
    private $description;
    private $language;
    private $currency;
    private $totalAmount;
    private $taxAmount;
    private $devolutionBase;
    private $tipAmount;
    private $payer;
    private $buyer;
    private $shiping;
    private $ipAddress;
    private $userAgent;
    private $additionalData;

    public function __construct(RequestBuilder $builder)
    {
        $rawResquestData = $builder->getRawRequest();
        
        foreach ($rawResquestData as $propierty => $value) {
            $this->{$propierty} = $value;
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}