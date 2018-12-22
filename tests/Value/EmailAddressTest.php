<?php

use PHPUnit\Framework\TestCase;
use Plase\Value\EmailAddress;

class EmailAddressTest extends TestCase
{
    public function testCreatedFromValidEmailAddress()
    {
        $this->assertInstanceOf(
            EmailAddress::class,
            EmailAddress::fromString('user@example.com')
        );
    }

    public function testCreatedFromInvalidEmailAddress()
    {
        $this->expectException(InvalidArgumentException::class);

        EmailAddress::fromString('invalid');
    }

    public function testGetEmailAddress()
    {
        $emailAddress = EmailAddress::fromString('user@example.com');

        $this->assertEquals(
            'user@example.com',
            $emailAddress->get()
        );
    }
}
