<?php

namespace Plase;

class Config
{
    private $login;
    private $tranKey;
    private $wsdl;
    private $location;

    public function __construct(Array $options)
    {
        $this->setOptions($options);    
    }

    public static function create(Array $options)
    {
        return new static($options);
    }

    private function setOptions($options)
    {
        $options = OptionsValidator::resolve(
            array_keys(get_object_vars($this)),
            $options
        );

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
