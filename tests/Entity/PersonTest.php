<?php

use PHPUnit\Framework\TestCase;
use Plase\Entity\Person;

class PersonTest extends TestCase
{
    public function testCreatePersonValidData()
    {   
        $faker = \Faker\Factory::create();

        $defaultValidTypes = ['CC', 'CE', 'TI', 'PPN','NIT','SSN'];

        $person = Person::fromArray([
            'document' => $faker->randomNumber,
            'documentType' => $defaultValidTypes[rand(0,5)],
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'company' => $faker->company,
            'emailAddress' => $faker->email,
            'address' => $faker->address,
            'city' => $faker->city,
            'province' => $faker->state,
            'country' => $faker->countryCode,
            'phone' => $faker->phoneNumber,
            'mobile' => $faker->phoneNumber
        ]);

        $this->assertInstanceOf(
            Person::class,
            $person
        );
    }

    public function testCreateWhitMissingData()
    {
        $this->expectException(InvalidArgumentException::class);
        
        $person = new Person([]);
    }
    
}