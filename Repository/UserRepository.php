<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';  //ID_user	email	password	firstName	lastName    ID_role    phone	ID_address

class UserRepository extends Repository {
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
}