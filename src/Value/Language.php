<?php

namespace Plase\Value;

class Language implements ValueObjectInterface
{
    private $isoCode;
    
    public function __construct($anIsoCode)
    {
        $this->setIsoCode($anIsoCode);
    }

    private function setIsoCode($anIsoCode)
    {
        if (!preg_match('/^[A-Z]{2}$/', $anIsoCode)) {
            throw new \InvalidArgumentException();
        }
        
        $this->isoCode = $anIsoCode;
    }

    public function get()
    {
        return $this->isoCode;
    }
}
