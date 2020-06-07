<?php
// ID_details	ID_order	ID_product	quantity	amount


class Details {
    private $ID_details;
    private $ID_order;
    private $ID_product;
    private $quantity;
    private $amount;    

    public function __construct(
        int $ID_details = null,
        int $ID_order,
        int $ID_product,
        int $quantity,
        string $amount     
        ) {
            $this->ID_order = $ID_order;
            $this->ID_product = $ID_product;
            $this->quantity = $quantity;
            $this->amount = doubleval($amount); 
            $this->ID_details = $ID_details;
    }

    public function getIdDetails() :int {
        return $this->ID_details;
    }

    public function getIdOrder() :string {
        return $this->ID_order;
    }
    public function getIdProduct() :string {
        return $this->ID_product;
    }
    public function getQuantity() :string {
        return $this->quantity;
    }
    public function getAmong() :string {
        return $this->amount;
    }
}