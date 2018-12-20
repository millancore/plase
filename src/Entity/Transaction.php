<?php

namespace Plase\Entity;

class Transaction
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
    private $ipAddress;
    private $userAgent;
    private $additionalData;
}
