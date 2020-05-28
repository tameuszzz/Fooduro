<?php

require_once 'AppController.php';
require_once __DIR__ . '/../Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';
require_once __DIR__.'//..//Repository//HelpRepository.php';

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
        // if(!$_SESSION){
        //     $url = "http://$_SERVER[HTTP_HOST]/";
        //     header("Location: {$url}Fooduro/?page=login");
        //     return; 
        // }
        // $helpRepository = new HelpRepository();
        // if($this->isPost()){
        //     $content = $_POST['content'];
        //     $helpRepository->sendMessage($content, $_SESSION['ID_user'], 0);
        // }
        
        // $this->numberOfNotAnwseredYourMessages = $helpRepository->allUserMessage($_SESSION['ID_user']);
        // $this->render('contact');

        if($_SESSION){
            $helpRepository = new HelpRepository();
            if($this->isPost()){
                $content = $_POST['content'];
                $helpRepository->sendMessage($content, $_SESSION['ID_user'], 0);
            }
            
            $this->numberOfNotAnwseredYourMessages = $helpRepository->allUserMessage($_SESSION['ID_user']);
        }
        
        $this->render('contact');
    }

}