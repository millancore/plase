<?php

namespace Plase\Entity;

use Plase\Value\Document;
use Plase\Value\EmailAddress;
use Plase\Value\Address;

class Person
{
    private $document;
    private $firstName;
    private $lastName;
    private $company;
    private $emailAddress;
    private $address;
    private $phone;
    private $mobile;

    public function __construct(
        Document $document,
        String $firstName,
        String $lastName,
        String $company,
        EmailAddress $emailAddress,
        Address $address,
        String $phone,
        String $mobile
    )
    {
        $this->document = $document;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->$company = $company;
        $this->emailAddress = $emailAddress;
        $this->address = $address;
        $this->phone = $phone;
        $this->mobile = $mobile;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
