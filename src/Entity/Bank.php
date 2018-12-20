<?php

namespace Plase\Entity;

class Bank
{
    private $bankCode;
    private $bankName;

    public function __construct(String $bankCode, String $bankName)
    {
        $this->bankCode = $bankCode;
        $this->bankName = $bankName;
    }

    public function bankCode()
    {
        return $this->bankCode;
    }

    public function bankName()
    {
        return $this->bankName;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
