<?php

use PHPUnit\Framework\TestCase;
use Plase\Transport\SoapTransport;

class SoapTransportTest extends TestCase
{
    public function testCreateInvalidSoapTransport()
    {
        $this->expectException(SoapFault::class);

        $soapTransport = new SoapTransport('fake.wdsl', []);
    }

    public function testCreateWithInvalidOptions()
    {
        $this->expectException(InvalidArgumentException::class);
        $soapTransport = new SoapTransport('fake.wdsl', ['invalid']);
    }
}