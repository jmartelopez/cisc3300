<?php

namespace in_class_14_project;

class Item {

    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function StateItem() {
        echo ':$';
    }
}
