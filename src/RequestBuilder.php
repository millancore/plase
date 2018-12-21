<?php

namespace Plase;

use Plase\Client\PSERequest;
use Plase\Entity\Person;

/**
 * Builder PSETransactionRequest
 */
class RequestBuilder implements RequestBuilderInterface
{
    use OptionsValidatorTrait;

    private $rawRequest;
    private $fields;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->setData($data);
        }
    }

    private function setData($data)
    {
        $this->fields = [
            'bankCode',
            'bankInterface',
            'returnURL',
            'reference',
            'description',
            'language',
            'currency',
            'totalAmount',
            'taxAmount',
            'devolutionBase',
            'tipAmount',
            'payer',
            'buyer',
            'shipping',
            'ipAddress',
            'userAgent',
            'additionalData'
        ];
        
        $validData = $this->validateData($data, $this->fields);

        foreach ($this->fields as $propierty) {
            $this->{$propierty}($validData[$propierty]);
        };
    }

    public static function create()
    {
        return new static();
    } 

    public function bankCode($bankCode)
    {
        $bankCode = trim($bankCode);
        if (!$bankCode) {
            throw new \InvalidArgumentException('bankCode can\'t be empty');
        }

        $this->rawRequest['bankCode'] = $bankCode;
        return $this;
    }

    public function bankInterface(Int $bankInterface)
    {
        if (!in_array($bankInterface, [0, 1])) {
            throw new \InvalidArgumentException('Invalid bankInterface');
        }

        $this->rawRequest['bankInterface'] = $bankInterface;
        return $this;
    }

    public function returnURL(String $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Is not valid url');
        }

        $this->rawRequest['returnURL'] = $url;
        return $this;
    }

    public function reference(String $reference)
    {
        $reference = trim($reference);
        if (!$reference) {
            throw new \InvalidArgumentException('reference can\'t be empty');
        }

        $this->rawRequest['reference'] = $reference;
        return $this;
    }

    public function description(String $description)
    {
        $description = trim($description);
        if (!$description) {
            throw new \InvalidArgumentException('description can\'t be empty');
        }

        $this->rawRequest['description'] = $description;
        return $this;
    }

    public function language(String $language)
    {
        $language = \Plase\Value\Language::fromString($language)->get();
        $this->rawRequest['language'] = $language;
        return $this;
    }

    public function currency(String $currency)
    {
        $currency = \Plase\Value\Currency::fromString($currency)->get();
        $this->rawRequest['currency'] = $currency;
        return $this;
    }

    public function totalAmount(Float $totalAmount)
    {
        $this->rawRequest['totalAmount'] = $totalAmount;
    }

    public function taxAmount(Float $taxAmount)
    {
        $this->rawRequest['taxAmount'] = $taxAmount;
    }

    public function devolutionBase(Float $devolutionBase)
    {
        $this->rawRequest['devolutionBase'] = $devolutionBase;
    }

    public function tipAmount(Float $tipAmount)
    {
        $this->rawRequest['tipAmount'] = $tipAmount;
    }

    public function payer(Person $payer)
    {
        $this->rawRequest['payer'] = $payer->toArray();
        return $this;
    }

    public function buyer(Person $buyer)
    {
        $this->rawRequest['buyer'] = $buyer->toArray();
        return $this;
    }

    public function shipping(Person $shipping)
    {
        $this->rawRequest['shipping'] = $shipping->toArray();
        return $this;
    }

    public function ipAddress($ipAddress)
    {
        $ipAddress = \Plase\Value\IPAddress::fromString($ipAddress)->get();
        $this->rawRequest['ipAddress'] = $ipAddress;
        return $this;
    }

    public function userAgent(String $userAgent)
    {
        $userAgent = trim($userAgent);
        if (!$userAgent) {
            throw new \InvalidArgumentException('userAgent can\'t be empty');
        }

        $this->rawRequest['userAgent'] = $userAgent;
        return $this;
    }

    public function additionalData(array $attribute)
    {
        $attribute = \Plase\Entity\Attribute::fromArray($attribute);

        $this->rawRequest['additionalData'][] = $attribute->toArray();
        return $this;
    }

    public function getRawRequest()
    {
        return $this->rawRequest;
    }

    public function request()
    {
        return new PSERequest($this);
    }
}
