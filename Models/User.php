<?php
//ID_user	email	password	firstName	lastName	phone	ID_address
class User {
    private $ID_user;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $ID_role;
    private $phone;
    private $ID_address;
    

    public function __construct(
        int $ID_user = null,
        string $email,
        string $password,
        string $firstName,
        string $lastName,
        int $ID_role = null,
        string $phone = null,
        int $ID_address = null
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->ID_role = $ID_role;
        $this->phone = $phone;
        $this->ID_address = $ID_address;
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
    public function getLastName() :string{
        return $this->lastName;
    }
    public function getIdRole() :int{
        return $this->ID_role;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getIdAddress(){
        return $this->ID_address;
    }
}