<?php
//ID_user	email	password	firstName	lastName	phone	ID_address
class User {
    private $ID_user;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $phone;
    private $ID_address;

    public function __construct(
        int $ID_user = null,
        string $email,
        string $password,
        string $firstName,
        string $lastName,
        string $phone = null,
        int $ID_address = null
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        ($this->phone == null) ? $this->phone = '' : $this->phone = $phone;
        ($this->ID_address == null) ? $this->ID_address = '' : $this->ID_address = $ID_address;
        $this->ID_user = $ID_user;
    }

    public function getIdUser() :int {
        return $this->ID_user;
    }
    public function getEmail() :string {
        return $this->email;
    }
    public function getPassword() :string{
        return $this->password;
    }
    public function getFirstName() :string{
        return $this->firstName;
    }
    public function getlastName() :string{
        return $this->lastName;
    }
    public function getPhone() :string{
        return $this->phone;
    }
    public function getIdAddress() :string{
        return $this->ID_address;
    }
}