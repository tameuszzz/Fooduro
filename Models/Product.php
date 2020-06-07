<?php

//ID_product   name   price   promotion   ID_category   description   photo
class Product {
    private $ID_product;
    private $name;
    private $price;
    private $promotion;
    private $ID_category;
    private $description;
    private $photo;

    public function __construct(
        int $ID_product = null,
        string $name,
        string $price,
        string $promotion,
        int $ID_category,
        string $description,
        string $photo
    ) {
        $this->name = $name;
        $this->price = (double)$price;
        $this->promotion = (double)$promotion;
        $this->ID_category = $ID_category;
        $this->description = $description;
        $this->photo = $photo;
        $this->ID_product = $ID_product;
    }

    public function getIdProduct() {
        return $this->ID_product;
    }

    public function getName() :string {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getPromotion() {
        return $this->promotion;
    }

    public function getIdCategory() :int {
        return $this->ID_category;
    }

    public function getDescription() :string {
        return $this->description;
    }

    public function getPhoto() :string {
        return $this->photo;
    }


}


