<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//Product.php';  //ID_product   name   price   promotion   ID_category   description   photo
require_once __DIR__.'//..//Models//Category.php';  //ID_category   name
require_once __DIR__.'//..//Models//Details.php';
require_once __DIR__.'//..//Models//Order.php';

class ProductRepository extends Repository {
    // Category
    public function getAllCategories(){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM category
        ');
        $stmt->execute();

        $result = [];
        $ones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($ones == false) {
            return null;
        }
        foreach ($ones as $one){
            $result[] = new Category(
                $one['ID_category'],
                $one['name']
            );
        }
        return $result;
    }
    public function GetCategoryById(int $ID_category){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM category WHERE ID_category = :ID_category
        ');

        $stmt->bindParam(':ID_category', $ID_category, PDO::PARAM_INT);
        $stmt->execute();

        $one = $stmt->fetch(PDO::FETCH_ASSOC);

        if($one == false) {
            return null;
        }

        return new Category(
            $one['ID_category'],
            $one['name']
        );
    }
    // Product
    public function getAllProductFromCategory(int $ID_category){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM product
            WHERE ID_category = :ID_category
        ');
        $stmt->bindParam(':ID_category', $ID_category, PDO::PARAM_INT);
        $stmt->execute();

        $result = [];
        $ones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($ones == false) {
            return null;
        }
        foreach ($ones as $one){
            $result[] = new Product(
                $one['ID_product'],
                $one['name'],
                $one['price'],
                $one['promotion'],
                $one['ID_category'],
                $one['description'],
                $one['photo']
            );
        }
        return $result;
    }
    public function getAllProducts(){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM product
        ');
        $stmt->execute();

        $result = [];
        $ones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($ones == false) {
            return null;
        }
        foreach ($ones as $one){
            $result[] = new Product(
                $one['ID_product'],
                $one['name'],
                $one['price'],
                $one['promotion'],
                $one['ID_category'],
                $one['description'],
                $one['photo']
            );
        }
        return $result;
    }

    public function get12NewProducts(){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM product
            ORDER BY ID_product desc
            LIMIT 12
        ');
        $stmt->execute();

        $result = [];
        $ones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($ones == false) {
            return null;
        }
        foreach ($ones as $one){
            $result[] = new Product(
                $one['ID_product'],
                $one['name'],
                $one['price'],
                $one['promotion'],
                $one['ID_category'],
                $one['description'],
                $one['photo']
            );
        }
        return $result;
    }

    public function getProductById($ID_product){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM product
            WHERE ID_product = :ID_product
        ');
        $stmt->bindParam(':ID_product', $ID_product, PDO::PARAM_INT);
        $stmt->execute();
    
        $one = $stmt->fetch(PDO::FETCH_ASSOC);
        if($one == false) {
            return null;
        }
        return new Product(
            $one['ID_product'],
            $one['name'],
            $one['price'],
            $one['promotion'],
            $one['ID_category'],
            $one['description'],
            $one['photo']
        );
    }

    public function dropProduct($ID_product){
        $stmt = $this->database->connect()->prepare('
            DELETE FROM `product` 
            WHERE `product`.`ID_product` = :ID_product
        ');
        $stmt->bindParam(':ID_product', $ID_product, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function addProduct($name, $price, $ID_category){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO product(name, price, ID_category)
            VALUES (:name, :price, :ID_category)
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price', strval($price), PDO::PARAM_STR);
        $stmt->bindParam(':ID_category', $ID_category, PDO::PARAM_INT);
        $stmt->execute();
    }

    //Order
    public function takeUserOrder($ID_user, $status){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM `order`
            WHERE ID_user = :ID_user
            AND status = :status
        ');
        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->execute();

        $one = $stmt->fetch(PDO::FETCH_ASSOC);
        if($one == false) {
            return null;
        }
        return new Order(
            $one['ID_order'],
            $one['ID_user'],
            $one['date'],
            $one['amount'],
            $one['status'],
            $one['discount'],
            $one['ID_shop']
        );
    }
    public function makeOrder($ID_user, $date, $amount, $status, $discount, $ID_shop){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO `order`(ID_user, date, amount, status, discount, ID_shop)
            VALUES(:ID_user, :date, :amount, :status, :discount, :ID_shop)
        ');
        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':amount', strval($amount), PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':discount', strval($discount), PDO::PARAM_STR);
        $stmt->bindParam(':ID_shop', $ID_shop, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editOrder($ID_user, $date, $amount, $status, $discount){
        $stmt = $this->database->connect()->prepare('
            UPDATE `order`
            SET date = :date, amount = :amount, status = :status, discount = :discount
            WHERE ID_user = :ID_user 
            AND status = 1
        ');
        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':amount', strval($amount), PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':discount', strval($discount), PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getAmount($ID_order){
        $stmt = $this->database->connect()->prepare('
            SELECT sum(amount) as ill FROM detail
            WHERE ID_order = :ID_order
        ');
        $stmt->bindParam(':ID_order', $ID_order, PDO::PARAM_INT);
        $stmt->execute();

        $ones = $stmt->fetch(PDO::FETCH_ASSOC);
        if($ones == false) {
            return null;
        }

        return $ones['ill'];
    }

    

    //details
    public function makeDetails($ID_order, $ID_product, $quantity, $amount){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO detail(ID_order, ID_product, quantity, amount)
            VALUES(:ID_order, :ID_product, :quantity, :amount)
        ');
        $stmt->bindParam(':ID_order', $ID_order, PDO::PARAM_INT);
        $stmt->bindParam(':ID_product', $ID_product, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':amount', strval($amount), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editDetails($ID_order, $ID_product, $quantity, $amount){
        $stmt = $this->database->connect()->prepare('
            UPDATE detail
            SET quantity = :quantity, amount = :amount
            WHERE ID_order = :ID_order
            AND ID_product = :ID_product
            
        ');
        $stmt->bindParam(':ID_order', $ID_order, PDO::PARAM_INT);
        $stmt->bindParam(':ID_product', $ID_product, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':amount', strval($amount), PDO::PARAM_STR);
        $stmt->execute();
    }
    public function takeUserDetails($ID_order){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM `detail`
            WHERE ID_order = :ID_order
        ');
        $stmt->bindParam(':ID_order', $ID_order, PDO::PARAM_INT);
        $stmt->execute();

        $ones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($ones == false) {
            return null;
        }
        foreach ($ones as $one){
            $result[] =  new Details(
                $one['ID_detail'],
                $one['ID_order'],
                $one['ID_product'],
                $one['quantity'],
                $one['amount']
            );
        }   
        return $result;
    }
    public function getNumberOfDetails($ID_order){
        $stmt = $this->database->connect()->prepare('
            SELECT count(ID_detail) as ill
            FROM detail
            WHERE ID_order = :ID_order
        ');
        $stmt->bindParam(':ID_order', $ID_order, PDO::PARAM_INT);
        $stmt->execute();

        $ones = $stmt->fetch(PDO::FETCH_ASSOC);
        if($ones == false) {
            return null;
        }
        return $ones['ill'];
    }
    public function dropDetails($ID_detail){
        $stmt = $this->database->connect()->prepare('
            DELETE FROM `detail` 
            WHERE `detail`.`ID_detail` = :ID_detail
        ');
        $stmt->bindParam(':ID_detail', $ID_detail, PDO::PARAM_INT);
        $stmt->execute();
    }
}