<?php

namespace Plase\Entity;

use Plase\Value\EmailAddress;
use Plase\OptionsValidatorTrait;

class Person
{
    use OptionsValidatorTrait;

    private $document;
    private $documentType;
    private $firstName;
    private $lastName;
    private $company;
    private $emailAddress;
    private $address;
    private $city;
    private $province;
    private $country;
    private $phone;
    private $mobile;

    public function __construct(Array $data)
    {
        $validData = $this->validateData($data);

        foreach ($validData as $propierty => $value) {
            $this->{$propierty} = $value;
        }

        $this->setDocumentType($data['documentType']);
        $this->setEmailAddress($data['emailAddress']);
    }

    public static function fromArray(Array $data)
    {
        return new static($data);
    }

    private function setDocumentType($documentType)
    {
        if (!in_array($documentType, ['CC', 'CE', 'TI', 'PPN','NIT','SSN'])) {
            throw new \InvalidArgumentException('Invalid DocumentType');
        }

        $this->documentType = $documentType;
    }

    private function setEmailAddress($emailAddress)
    {
        $this->emailAddress = EmailAddress::fromString($emailAddress)->get();
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
