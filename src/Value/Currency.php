<?php

namespace Plase\Value;

class Currency implements ValueObjectInterface
{
    private $isoCode;
    
    public function __construct($anIsoCode)
    {
        $this->setIsoCode($anIsoCode);
    }

    private function setIsoCode($anIsoCode)
    {
        if (!preg_match('/^[A-Z]{3}$/', $anIsoCode)) {
            throw new \InvalidArgumentException();
        }
        
        $this->isoCode = $anIsoCode;
    }

    public static function fromString($anIsoCode)
    {
        return new self($anIsoCode);
    }

    public function get()
    {
        return $this->isoCode;
    }
}
