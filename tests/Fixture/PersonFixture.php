<?php

namespace Plase\Fixture;

use Plase\Entity\Person;

class PersonFixture
{
    public static function generate()
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

        return $person;
    }
    
}
