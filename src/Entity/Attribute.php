<?php

namespace Plase\Entity;

class Attribute 
{
    private $name;
    private $value;

    public function __construct(String $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function name()
    {
        return $this->name;
    }

    public function value()
    {
        return $this->value;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
