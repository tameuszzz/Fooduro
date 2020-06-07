<?php

//ID_address	street	house_number	flat_number	postal_code	city	country


class Address {
    private $ID_address;
    private $street;
    private $house_number;
    private $flat_number;
    private $postal_code;
    private $city;
    private $country;

    public function __construct(
        int $ID_address = null,
        string $street = null,
        int $house_number = null,
        int $flat_number = null,
        int $postal_code = null,
        string $city = null,
        string $country = null
    ) {
        $this->street = $street;
        $this->house_number = $house_number;
        $this->flat_number = $flat_number;
        $this->postal_code = $postal_code;
        $this->city = $city;
        $this->country = $country;
        $this->ID_address = $ID_address;
    }

    public function getIdAddress() {
        return $this->ID_address;
    }

    public function getStreet() {
        return $this->street;
    }
    public function getHouseNumber() {
        return $this->house_number;
    }
    public function getFlatNumber() {
        return $this->flat_number;
    }
    public function getPostalCode(){
        return $this->postal_code;
    }
    public function getCity() {
        return $this->city;
    }
    public function getCountry() {
        return $this->country;
    }

}