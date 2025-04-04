<?php

namespace App\controllers;

use App\models\Product;

class ProductController
{
    public function getProduct() {
        $ProductModel = new Product();
        $query = !empty($_GET['Name']) ? $_GET['Name'] : null;
        $products = $ProductModel->getProduct($query);
        echo json_encode($products);
        exit();
    }

    public function getProductByID($id) {
        $ProductModel = new Product();
        $products = $ProductModel->getProductById($id);
        echo json_encode($products);
        exit();
    }

    public function ProductView() {
        include 'Public/Product.html';
        exit();
    }

    public function ProductDetailsView() {
        include 'Public/ProductDetails.html';
        exit();
    }

}