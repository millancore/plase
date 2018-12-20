<?php

namespace Plase\Client;

use Plase\TransactionBuilder;

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

    public function __construct(TransactionBuilder $builder)
    {
        $rawResquestData = $builder->getRawTransaction();
        
        foreach ($propierties as $propierty) {
            $this->{$propierty} = $rawResquestData[$propierty];
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}