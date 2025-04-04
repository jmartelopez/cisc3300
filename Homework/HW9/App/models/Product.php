<?php

namespace App\models;

class Product extends Model {

    public function getProduct($Name) {
        if ($Name) {
            $query = "select * from products WHERE Name like :Name";
            return $this->fetchAllWithParams($query, ['Name' => '%' . $Name . '%']);
        }
        $query = "select * from products";
        return $this->fetchAll($query);
    }

    public function getProductById($id){
        $query = "select * from products where id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}