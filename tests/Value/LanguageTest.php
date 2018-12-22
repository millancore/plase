<?php

use PHPUnit\Framework\TestCase;
use Plase\Value\Language;

class LanguageTest extends TestCase
{
    public function testCreatedFromValidLanguage()
    {
        $faker = \Faker\Factory::create();

        $this->assertInstanceOf(
            Language::class,
            Language::fromString(strtoupper($faker->languageCode))
        );
    }

    public function testCreatedFromInvalidLanguage()
    {
        $this->expectException(InvalidArgumentException::class);

        Language::fromString('es');
    }

    public function testGetLanguage()
    {
        $language = Language::fromString('EN');

        $this->assertEquals(
            'EN',
            $language->get()
        );
    }
}