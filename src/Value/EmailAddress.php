<?php

namespace Plase\Value;

class EmailAddress implements ValueObjectInterface
{
    private $email;

    public function __construct(String $email)
    {
        $this->setEmail($email);
    }

    private function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Ivalid format emailAddress');
        }

        $this->email = $email;
    }

    public static function fromString(String $email)
    {
        return new self($email);
    }

    public function get()
    {
        return $this->email;
    }
}
