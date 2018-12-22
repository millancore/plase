<?php

use PHPUnit\Framework\TestCase;
use Plase\Value\Currency;

class CurrencyTest extends TestCase
{
    public function testCreatedFromValidCurrencyCode()
    {
        $faker = \Faker\Factory::create();

        $this->assertInstanceOf(
            Currency::class,
            Currency::fromString($faker->currencyCode)
        );
    }

    public function testCreatedFromInvalidCurrencyCode()
    {
        $this->expectException(InvalidArgumentException::class);

        Currency::fromString('invalid');
    }

    public function testGetCurrencyCode()
    {
        $currency = Currency::fromString('COP');

        $this->assertEquals(
            'COP',
            $currency->get()
        );
    }
}