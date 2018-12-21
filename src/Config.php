<?php

namespace Plase;

use Symfony\Component\OptionsResolver\OptionsResolver;

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
        $resolver = new OptionsResolver();
       
        $validOptions = ['login', 'tranKey', 'wsdl', 'location'];
       
        $resolver->setDefined($validOptions);
        $resolver->setRequired($validOptions);

        $options = $resolver->resolve($options);

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
