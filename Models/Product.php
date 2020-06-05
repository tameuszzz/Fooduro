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
        double $price,
        double $promotion,
        int $ID_category,
        string $description,
        string $photo
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->promotion = $promotion;
        $this->ID_category = $ID_category;
        $this->description = $description;
        $this->photo = $photo;
    }

    public function getIdProduct() :int {
        return $this->ID_product;
    }

    public function getName() :string {
        return $this->name;
    }

    public function getPrice() :double {
        return $this->price;
    }

    public function getPromotion() :double {
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


