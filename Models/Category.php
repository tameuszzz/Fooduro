<?php

//ID_category   name

class Category {
    private $ID_category;
    private $name;
    public function __construct(
        int $ID_category = null,
        string $name
    ) {
        $this->name = $name;
        $this->ID_category = $ID_category;
    }

    public function getIdCategory() :int {
        return $this->ID_category;
    }

    public function getName() :string {
        return $this->name;
    }
}