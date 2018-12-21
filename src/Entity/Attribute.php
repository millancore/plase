<?php

namespace Plase\Entity;

class Attribute
{
    private $name;
    private $value;

    public function __construct(String $name, $value)
    {
        $this->setName($name);
        $this->setValue($value);
    }

    public static function fromArray(Array $data)
    {
        return new static($data['name'], $data['value']);
    }

    private function setName($name)
    {
        $name = trim($name);
        if (!$name) {
            throw new \InvalidArgumentException('Name can\'t be empty');
        }

        $this->name = $name;
    }

    private function setValue($value)
    {
        $value = trim($value);
        if (!$value) {
            throw new \InvalidArgumentException('value can\'t be empty');
        }

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
