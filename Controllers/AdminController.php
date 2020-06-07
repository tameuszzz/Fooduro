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
            $promotion = $_POST['promotion'];
            $ID_category = $_POST['category'];
            $description = $_POST['description'];
            $photo = "";

            $mess = "";
            $array = explode('.', $_FILES['photo']['name']);
            $fileExt = strtolower(end($array));

            if ($_FILES['photo']['name'] != "") {

                $uploadAvailable = true;
                $extensions = array("jpeg", "jpg", "png");

                if (!in_array($fileExt, $extensions)) {
                    $mess = 'Złe rozszerzenie pliku. Wybierz plik z rozszerzeniem PNG lub JPEG';
                    $uploadAvailable = false;
                }

                if ($_FILES['photo']['size'] > 1048576) {        // upload_max_size returns 0 if the size of file is bigger than 2M
                    $mess = 'Plik zbyt duży. Maksymalna wielkość pliku to 1MB';
                    $uploadAvailable = false;
                }
                
            }

            if ($uploadAvailable) {
                $this->productRepository->addProduct($name, $price, $promotion, $ID_category, $description, $photo);
            } else {
                die($mess);
            }

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