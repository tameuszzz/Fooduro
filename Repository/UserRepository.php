<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';      //ID_user	email	password	firstName	lastName    ID_role    phone	ID_address
require_once __DIR__.'//..//Models//Address.php';   //ID_address	street	house_number	flat_number	postal_code	city	country

class UserRepository extends Repository {
    // User
    public function makeUser(string $email, string $password, string $firstName, string $lastName){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO  USER (email, password, firstName, lastName, ID_role, phone, ID_address) 
            VALUES (:email, :password, :firstName, :lastName, 1, NULL, NULL)
            ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->execute();
    }  

    public function getUserByEmail(string $email): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user WHERE email = :email
        ');

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['ID_user'],
            $user['email'],
            $user['password'],
            $user['firstName'],
            $user['lastName'],
            $user['ID_role'],
            $user['phone'],
            $user['ID_address']
        );
    }

    public function getUserById(int $ID_user): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user WHERE ID_user = :ID_user
        ');

        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['ID_user'],
            $user['email'],
            $user['password'],
            $user['firstName'],
            $user['lastName'],
            $user['ID_role'],
            $user['phone'],
            $user['ID_address']
        );
    }

    public function editUser($ID_user, $email, $firstName, $lastName, $phone, $ID_address){
        $stmt = $this->database->connect()->prepare('
            UPDATE user
            SET email = :email, firstName = :firstName, lastName = :lastName, phone = :phone, ID_address = :ID_address
            WHERE ID_user = :ID_user
        ');

        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':ID_address', $ID_address, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editUsersRole($ID_user, $ID_role){
        $stmt = $this->database->connect()->prepare('
            UPDATE user
            SET ID_role = :ID_role
            WHERE ID_user = :ID_user
        ');

        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->bindParam(':ID_role', $ID_role, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function dropUser($ID_user){
        $stmt = $this->database->connect()->prepare('
            DELETE FROM `user` 
            WHERE `user`.`ID_user` = :ID_user
        ');
        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getAllUsers() {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($users == false) {
            return null;
        }

        $result = [];
        foreach ($users as $user){
            $result[]= new User(
                $user['ID_user'],
                $user['email'],
                $user['password'],
                $user['firstName'],
                $user['lastName'],
                $user['ID_role'],
                $user['phone'],
                $user['ID_address']
            );
        }
        return $result;
    }

    // Address
    public function getAddressById(int $ID_address){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM address WHERE ID_address = :ID_address
        ');
        $stmt->bindParam(':ID_address', $ID_address, PDO::PARAM_INT);
        $stmt->execute();

        $one = $stmt->fetch(PDO::FETCH_ASSOC);

        if($one == false) {
            return null;
        }

        return new Address(
            $one['ID_address'],
            $one['street'],
            $one['house_number'],
            $one['flat_number'],
            $one['postal_code'],
            $one['city'],
            $one['country']
        );
    }

    public function editAddress($ID_address, $street, $postal_code, $city, $country) {
        $stmt = $this->database->connect()->prepare('
            UPDATE address
            SET street = :street, postal_code = :postal_code, city = :city, country = :country
            WHERE ID_address = :ID_address
        ');

        $stmt->bindParam(':ID_address', $ID_address, PDO::PARAM_INT);
        $stmt->bindParam(':street', $street, PDO::PARAM_STR);
        $stmt->bindParam(':postal_code', $postal_code, PDO::PARAM_INT);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function makeAddress($street, $postal_code, $city, $country){ 
        //ID_address	street	house_number	flat_number	postal_code	city	country
        $stmt = $this->database->connect()->prepare('
            INSERT INTO ADDRESS(street, postal_code, city, country)
            VALUES (:street, :postal_code, :city, :country) 
        ');
        $stmt->bindParam(':street', $street, PDO::PARAM_STR);
        $stmt->bindParam(':postal_code', $postal_code, PDO::PARAM_INT);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getLastAddressID(){
        $stmt = $this->database->connect()->prepare('
            SELECT max(ID_address) as ill FROM address
        ');
        $stmt->execute();
        $one = $stmt->fetch(PDO::FETCH_ASSOC);
        return $one['ill'];
    }
}