<?php

require_once "Repository.php";

class UserRepository extends Repository {
    public function sendMessage(string $content, int $ID_user, int $anwser){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO  HELP (content, ID_user, anwser) 
            VALUES (:content, :ID_user, :anwser)
            ');
        $stmt->bindParam(':content', $content, PDO::PARAM_INT);
        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->bindParam(':anwser', $anwser, PDO::PARAM_INT);
        $stmt->execute();
    }  

}