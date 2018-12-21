<?php

namespace Plase\Value;

class IPAddress implements ValueObjectInterface
{
    private $ipAddress;

    public function __construct($ipAddress)
    {
        $this->setIPAddress($ipAddress);
    }

    private function setIPAddress($ipAddress)
    {
        if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException('Invalid IP Address');
        }

        $this->ipAddress = $ipAddress;
    }

    public static function fromString($ipAddress)
    {
        return new self($ipAddress);
    }

    public function get()
    {
        return $this->ipAddress;
    }
}
