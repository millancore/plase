<?php

use PHPUnit\Framework\TestCase;
use Plase\Value\IPAddress;

class IPAddressTest extends TestCase
{
    public function testCreatedFromValidIPAddress()
    {
        $faker = \Faker\Factory::create();

        $this->assertInstanceOf(
            IPAddress::class,
            IPAddress::fromString($faker->ipv4)
        );
    }

    public function testCreatedFromInvalidIPAddress()
    {
        $this->expectException(InvalidArgumentException::class);

        IPAddress::fromString('invalid');
    }

    public function testGetIPAddress()
    {
        $IPAddress = IPAddress::fromString('127.0.0.1');

        $this->assertEquals(
            '127.0.0.1',
            $IPAddress->get()
        );
    }
}