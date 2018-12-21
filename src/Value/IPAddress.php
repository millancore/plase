<?php

namespace Plase\Value;

class IPAddress implements ValueObjectInterface
{
    private $ip;

    public function __construct(Int $ipAddress)
    {
        $this->setIPAddress($ipAddress);
    }

    private function setIPAddress($ipAddress)
    {
        if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException('Invalid IP Address');
        }

        $this->ip = $ip;
    }

    public function get()
    {
        return $this->ip;
    }
}
