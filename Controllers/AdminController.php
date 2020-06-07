<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';
require_once __DIR__.'//..//Repository//ProductRepository.php';

class AdminController extends AppController {

    public function __construct(){
        session_start();
        $this->userRepository = new UserRepository();
        $this->productRepository = new ProductRepository();
        $q = $this->productRepository->takeUserOrder($_SESSION['ID_user'], 1);
        ($q == null) ? $this->ilosc_details = 0 : $this->ilosc_details = $this->productRepository->getNumberOfDetails($q->getIdOrder());

    }

    public function loadAdminPanel() {
        if (isset($_SESSION['ID_user'])) {
            $this->getUsers();
            $this->getProducts();

            $this->render('adminpanel');
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fooduro/?page=home");
            return;
        }
    }

    public function getUsers() {
        $this->allUsers = $this->userRepository->getAllUsers();
    }

    public function deleteUser(): void {
        $this->userRepository->dropUser($_GET['id']);
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fooduro/?page=adminpanel");
        return;
    }
    public function makeAdm(): void {
        $this->userRepository->editUsersRole($_GET['id'], 2);
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fooduro/?page=adminpanel");
        return;
    }
    public function dropAdm(): void {
        $this->userRepository->editUsersRole($_GET['id'], 1);
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fooduro/?page=adminpanel");
        return;
    }

    public function getProducts() {
        $this->allProducts = $this->productRepository->getAllProducts();
    }

    public function addProducts() {
        if($this->isPost()){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $ID_category = $_POST['category'];
            $this->productRepository->addProduct($name, $price, $ID_category);
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fooduro/?page=adminpanel");
            return;
        }
        $this->render('addProd');
    }

    public function deleteProducts(): void {
        $this->productRepository->dropProduct($_GET['id'], 1);
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fooduro/?page=adminpanel");
        return;
    }

}