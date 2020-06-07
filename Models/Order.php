<?php
// 	ID_order	ID_user	date	amount	status	discount	ID_details	ID_shop

class Order {
    private $ID_order;
    private $ID_user;
    private $date;
    private $amount;
    private $status;
    private $discount;
    private $ID_shop;

    public function __construct(
        int $ID_order = null,
        int $ID_user,
        string $date,
        string $amount,
        int $status,
        string $discount,
        int $ID_shop
    ) {
        $this->ID_user = $ID_user;
        $this->date = $date;
        $this->amount = doubleval($amount);
        $this->status = $status;
        $this->discount = doubleval($discount);
        $this->ID_shop = $ID_shop;  
        $this->ID_order = $ID_order;
    }

    public function getIdOrder(){
        return $this->ID_order;
    }
    public function getIdUser() {
        return $this->ID_user;
    }
    public function getDate(){
        return $this->date;
    }
    public function getStatus() {
        return $this->status;
    }
    public function getDiscount() {
        return $this->discoun;
    }
    public function getIdShop() {
        return $this->ID_shop;
    }

}