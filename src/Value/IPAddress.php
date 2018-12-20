<?php

namespace Plase\Value;

class IPAddress
{
    private $ip;

    public function __construct(Int $ipAddress)
    {
        $this->setIPAddress($ipAddress);
    }

    private function setIPAddress($ipAddress)
    {
        if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException();
        }

        $this->ip = $ip;
    }

    public function ip()
    {
        return $this->ip;
    }
}
