<?php

use PHPUnit\Framework\TestCase;
use Plase\Fixture\PersonFixture;
use Plase\Entity\Attribute;
use Plase\RequestBuilder;
use Plase\Client\PSERequest;

class RequestBuilderTest extends TestCase
{

    public function testCreatedFromValidArrayData()
    {
        $faker = \Faker\Factory::create();

        $builder = new RequestBuilder([
            'bankCode' => $faker->randomNumber(4),
            'bankInterface' => rand(0,1),
            'returnURL' => $faker->url,
            'reference' => $faker->randomNumber,
            'description' => $faker->text,
            'language' => strtoupper($faker->languageCode),
            'currency' => $faker->currencyCode,
            'totalAmount' => $faker->randomFloat,
            'taxAmount' => $faker->randomFloat,
            'devolutionBase' => $faker->randomFloat,
            'tipAmount' => $faker->randomFloat,
            'payer' => PersonFixture::generate(),
            'buyer' => PersonFixture::generate(),
            'shipping' => PersonFixture::generate(),
            'ipAddress' => $faker->ipv4,
            'userAgent' => $faker->userAgent,
            'additionalData' => ['name' => 'code', 'value' => 123]
        ]);

        $this->assertInstanceOf(
            PSERequest::class,
            $builder->request()
        );

    }

}