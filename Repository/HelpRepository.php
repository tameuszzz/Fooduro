<?php

require_once "Repository.php";

class HelpRepository extends Repository {
    public function sendMessage(string $contents, int $ID_user, int $anwser){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO  HELP (contents, ID_user, anwser) 
            VALUES (:contents, :ID_user, :anwser)
            ');
        $stmt->bindParam(':contents', $contents, PDO::PARAM_STR);
        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->bindParam(':anwser', $anwser, PDO::PARAM_INT);
        $stmt->execute();
    }  

    public function allUserMessage(int $id){
        $stmt = $this->database->connect()->prepare('
        SELECT COUNT(ID_help) FROM HELP
        WHERE ID_user = :id
        AND anwser like 0
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $nr = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach($nr as $one){
            return $one;
        }
    }

}