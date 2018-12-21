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
            'document' => 1067024123,
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

        var_dump($person->toArray());

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