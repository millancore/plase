<?php

namespace Plase\Value;

class Language
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

    public function isoCode()
    {
        return $this->isoCode;
    }
}
