<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';
require_once __DIR__.'//..//Repository//ProductRepository.php';

class AdminController extends AppController {

    public function __construct(){
        session_start();
        $this->userRepository = new UserRepository();
    }

    public function loadAdminPanel() {
        if (isset($_SESSION['ID_user'])) {
            $this->render('adminpanel');
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fooduro/?page=home");
            return;
        }
    }

    public function getUsers() {
    
    }

    public function deleteUser(): void {
    
    }

    public function getProducts() {
    
    }

    public function addProducts() {
    
    }

    public function deleteProducts(): void {
    
    }

}