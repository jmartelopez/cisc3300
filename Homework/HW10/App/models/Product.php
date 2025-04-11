<?php

namespace App\models;

class Product extends Model {

    public function getProduct($Name) {
        if ($Name) {
            $query = "SELECT * FROM products WHERE Name LIKE :Name";
            return $this->fetchAllWithParams($query, ['Name' => '%' . $Name . '%']);
        }
        $query = "SELECT * FROM products";
        return $this->fetchAll($query);
    }

    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }

    public function createProduct($inputData) {
        $query = "INSERT INTO products (Name, Price) VALUES (:Name, :Price)";
        return $this->fetchAllWithParams($query, $inputData);
    }

    public function updateProduct($inputData) {
        $query = "UPDATE products SET Name = :Name, Price = :Price WHERE id = :id";
        return $this->fetchAllWithParams($query, $inputData);
    }

    public function deleteProduct($inputData) {
        $query = "DELETE FROM products WHERE id = :id";
        return $this->fetchAllWithParams($query, $inputData);
    }
}
