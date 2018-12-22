<?php

namespace Plase;

use Plase\Support\OptionsValidatorTrait;

class Config implements ConfigInterface
{
    use OptionsValidatorTrait;

    private $login;
    private $tranKey;
    private $wsdl;
    private $location;

    public function __construct(Array $options)
    {
        $this->setOptions($options);    
    }

    public static function set(Array $options)
    {
        return new static($options);
    }

    private function setOptions($options)
    {
        $options = $this->validateData($options);

        foreach ($options as $propierty => $value) {
            $this->{$propierty} = $value;
        }
    }

    public function login()
    {
        return $this->login;
    }

    public function tranKey()
    {
        return $this->tranKey;
    }

    public function wsdl()
    {
        return $this->wsdl;
    }

    public function location()
    {
        return $this->location;
    }

}
