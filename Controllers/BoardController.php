<?php

require_once 'AppController.php';
require_once __DIR__ . '/../Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class BoardController extends AppController {

    public function __construct(){
        session_start();
        $this->userRepository = new UserRepository();
    }

    public function loadHome() {
        if (isset($_SESSION['ID_user'])) {
            $this->render('home');
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fooduro/?page=login");
            return;
        }
    }

    public function loadAbout() {
        $this->render('about');
    }

    public function loadDelivery() {
        $this->render('delivery');
    }

    public function loadPayments() {
        $this->render('payments');
    }

    public function loadContact() {
        $this->render('contact');
    }

}