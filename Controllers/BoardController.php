<?php

require_once 'AppController.php';
require_once __DIR__ . '/../Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';
require_once __DIR__.'//..//Repository//HelpRepository.php';
require_once __DIR__.'//..//Repository//ProductRepository.php';
require_once __DIR__.'//..//Models//Address.php';

class BoardController extends AppController {

    public function __construct(){
        session_start();
        $this->userRepository = new UserRepository();
        $this->productRepository = new ProductRepository();

        $this->categories = $this->productRepository->getAllCategories();

        if (isset($_SESSION['ID_user'])) {
            $q = $this->productRepository->takeUserOrder($_SESSION['ID_user'], 1);
            ($q == null) ? $this->ilosc_details = 0 : $this->ilosc_details = $this->productRepository->getNumberOfDetails($q->getIdOrder());
        }
    }

    public function loadHome() {
        if (isset($_SESSION['ID_user'])) {
            $newProds = $this->productRepository->get12NewProducts();
            $this->render('home', ['newProds' => $newProds]);
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

    public function loadAccount() {
        if($this->isPost()){

            $ID_user = $_SESSION["ID_user"];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_SESSION['email'];
            $phone = $_POST['phone'];

            $street = $_POST['street'];
            $postal_code = $_POST['postal_code'];
            $city = $_POST['city'];
            ($_POST['country'] == 'NotSelected') ? $country = null : $country = $_POST['country'];
            ($_SESSION['ID_address'] == null) ? $IDadd = null : $IDadd = $_SESSION['ID_address'];
            

            if($_SESSION['ID_address'] == null && (isset($street) || isset($postal_code) || isset($city))){
                
                $this->userRepository->makeAddress($street, $postal_code, $city, $country);
                $lID = $this->userRepository->getLastAddressID();
                $_SESSION['ID_address'] = $lID;
                $this->userRepository->editUser($ID_user, $email, $firstName, $lastName, $phone, $lID);
                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['phone'] = $phone;

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}Fooduro/?page=home");
                return;
            }

            if($firstName != $_SESSION['firstName'] || $lastName != $_SESSION['lastName'] || $email != $_SESSION['email'] || $phone != $_SESSION['phone']){
                $this->userRepository->editUser($ID_user, $email, $firstName, $lastName, $phone, $IDadd);

                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['phone'] = $phone;
   
            }
            if($_SESSION['ID_address'] != null){
                $oneAddress = $this->userRepository->getAddressById($_SESSION['ID_address']);

                if($country == 'NotSelected'){
                    if($oneAddress->getCountry() == null)
                        $country = null;
                    else
                        $country = $oneAddress->getCountry();
                }
                if($street != $oneAddress->getStreet() || $postal_code != $oneAddress->getPostalCode() || $city != $oneAddress->getCity() || $country != $oneAddress->getCountry()){
                    $this->userRepository->editAddress($_SESSION['ID_address'], $street, $postal_code, $city, $country);
                }

            }
            $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}Fooduro/?page=home");
                return;
        }

        if (isset($_SESSION['ID_user'])) {
            $this->userD = $this->userRepository->getUserById($_SESSION["ID_user"]);

            $id_add = $this->userD->getIdAddress();
            if($id_add != null)
                $this->addressD = $this->userRepository->getAddressById($id_add);
            else {
                $this->addressD = new Address(null, null, null, null, null, null, null);
            }
            $this->render('account');

            
        }
        else {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fooduro/?page=login");
            return;
        }
    }

    public function loadCart() {
        if($this->productRepository->takeUserOrder($_SESSION['ID_user'], 1) != null){
            $orderID = $this->productRepository->takeUserOrder($_SESSION['ID_user'], 1)->getIdOrder();
            $userProducts = $this->productRepository->takeUserDetails($orderID);
            $this->render('cart', ['userPrs' => $userProducts]);
        } else {
            $this->render('cart');
        }
    }

    public function loadProducts() {
        $id = $_GET['id'];
        $products = $this->productRepository->getAllProductFromCategory($id);
        $this->render('products', ['prs' => $products]);
    }

    public function loadSearchProducts() {
        if($this->isPost()){
            $name = $_POST['name'];
            $products = $this->productRepository->getSearchProducts($name);
            $this->render('search', ['prs' => $products]);
        }
    }

    public function addToCart(){
        $ID_prod = $_GET['id'];
        //sprawdz czy uzytkownik ma order
        $order_id = $this->productRepository->takeUserOrder($_SESSION['ID_user'], 1);
        if($order_id == null){
            //jesli nie ma to stworz
            $this->productRepository->makeOrder($_SESSION['ID_user'], date('d/m/y'), 0, 1, 0, 1);
        }
        $orderID = $this->productRepository->takeUserOrder($_SESSION['ID_user'], 1)->getIdOrder();
        //dodaj produkt do details
        $amount = $this->productRepository->getProductById($ID_prod)->getPrice();
        $discount = $this->productRepository->getProductById($ID_prod)->getPromotion();
        $discount = $amount * $discount;
        $amount = $amount - $discount;
        $this->productRepository->makeDetails($orderID, $ID_prod, 1, $amount);

        //policz amount zamowienia

        //zaktulizuj ordera
        $this->productRepository->editOrder($_SESSION['ID_user'], date('d/m/y'), $amount, 1, 0);
        
        //przejdz do ordera
        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fooduro/?page=cart");
        return;
    }

    public function drop(){
        $this->productRepository->dropDetails($_GET['id']);


        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fooduro/?page=cart");
        return;
    }

    public function save(){
        $orderID = $this->productRepository->takeUserOrder($_SESSION['ID_user'], 1)->getIdOrder();
        $amount = $this->productRepository->getAmount($orderID);
        $this->productRepository->editOrder($_SESSION['ID_user'], date('d/m/y'), $amount, 2, 0);



        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fooduro/?page=cart");
        return;
    }


}