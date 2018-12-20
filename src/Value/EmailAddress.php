<?php

namespace Plase\Value;

class EmailAddress
{
    private $email;

    public function __construct(String $email)
    {
        $this->setEmail($email);
    }

    private function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException();
        }

        $this->email = $email;
    }

    public function email()
    {
        return $this->email;
    }
}
