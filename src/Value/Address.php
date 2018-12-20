<?php

namespace Plase\Value;

class Address
{
    private $address;
    private $city;
    private $province;
    private $country;
    
    public function __construct(
        String $address,
        String $city,
        String $province,
        String $country
    )
    {
        $this->address = $address;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
    }

    public function address()
    {
        return $this->address;
    }

    public function city()
    {
        return $this->city;
    }

    public function province()
    {
        return $this->province;
    }

    public function country()
    {
        return $this->country;
    }
}