<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class SecurityController extends AppController {
    public function __construct(){
        session_start();
        $this->userRepository = new UserRepository();
    }

    // Logowanie do serwisu
    public function login(){
        // Jeśli użytkownik jest zalogowany
        if($_SESSION){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fooduro/?page=home");
            return;
        }

        // Jeśli ktoś podjął próbę logowania
        if($this->isPost()){       
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userRepository->getUserByEmail($email);
            
            // Brak uzytkownika o podanym loginie
            if(!$user) {
                $this->render('login');
                return;
            }
            
            // Niepoprawne hasło
            if(!password_verify($password, $user->getPassword())){
                $this->render('login');
                return;
            }

            // session
            $_SESSION["ID_user"] = $user->getIdUser();
            $_SESSION["email"] = $user->getEmail();
            $_SESSION["password"] = $user->getPassword();
            $_SESSION["firstName"] = $user->getFirstName();
            $_SESSION["lastName"] = $user->getLastName();
            $_SESSION["phone"] = $user->getPhone();
            $_SESSION["ID_address"] = $user->getIdAddress();

            // cookies
            setcookie("userEmail", $_SESSION['email'], time()+3600*24);
            setcookie("userFirstName", $_SESSION['firstName'], time()+3600*24);

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fooduro/?page=home");
            return;
        }

        // Jeśli odwiedza podstronę
        $this->render('login');
    }    

    // Rejestrtacja użytkownika
    public function register(){
        // Jeśli użytkownik jest zalogowany
        if($_SESSION){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fooduro/?page=home"); 
            return;
        }

        // Jeśli ktoś podjął próbę rejestracji
        if($this->isPost()){
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];

            $user = $this->userRepository->getUserByEmail($email);

            // Error jeśli: Użytkownik o takim adresie email już istnieje!
            if($user){
                $this->render('register'); 
                return;
            }

            // Error jeśli: Hasło krótsze niż 6 znaków lub w emailu nie ma znau '@' lub hasła rożne!
            if(strlen($password1) < 6 || strpos($email, '@') == null || $password1 != $password2){
                $this->render('register');
                return;
            }

            // Success
            $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
            $this->userRepository->makeUser($email, $hashed_password, $firstName, $lastName);
            $this->render('emailConfirm'); 
            return;
        }

        // Jeśli odwiedza podstronę
        $this->render('register');
    }    
    
    // Wylogowywanie użytkownika
    public function logout(){
        session_unset();
        session_destroy();

        $this->render('login');
    }
}