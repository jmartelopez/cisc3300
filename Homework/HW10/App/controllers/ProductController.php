<?php

namespace App\controllers;

use App\models\Product;

class ProductController
{
    public function validateProduct($inputData) {
        $errors = [];
        $name = $inputData['Name'];
        $price = $inputData['Price'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['NameShort'] = 'Product name is too short';
            }
        } else {
            $errors['requiredName'] = 'Product name is required';
        }

        if ($price) {
            $price = preg_replace('/[^\d.]/', '', $price);
        
            if (!is_numeric($price)) {
                $errors['invalidPrice'] = 'Price must be a valid number';
            }
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        return [
            'Name' => $name,
            'Price' => $price,
        ];
    }

    public function getAllProducts() {
        $ProductModel = new Product();
        header("Content-Type: application/json");
        $products = $ProductModel->getProduct(null);

        echo json_encode($products);
        exit();
    }

    public function getProductByID($id) { 
        $ProductModel = new Product(); 
        header("Content-Type: application/json"); 
        $product = $ProductModel->getProductById($id);
         
        echo json_encode($product); 
        exit(); 
    }

    public function createProduct() {
        $inputData = [
            'Name' => $_POST['Name'] ?: null,
            'Price' => $_POST['Price'] ?: null,
        ];
        $productData = $this->validateProduct($inputData);

        $ProductModel = new Product();
        $ProductModel->createProduct(
            [
                'Name' => $productData['Name'],
                'Price' => $productData['Price'],
            ]
        );

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function updateProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'Name' => $_PUT['Name'] ?: null,
            'Price' => $_PUT['Price'] ?: null,
        ];
        $productData = $this->validateProduct($inputData);

        $ProductModel = new Product();
        $ProductModel->updateProduct(
            [
                'ID' => $id,
                'Name' => $productData['Name'],
                'Price' => $productData['Price'],
            ]
        );

        http_response_code(200);
        echo json_encode(['success' => true]);
        exit();
    }

    public function deleteProduct($id) {
        if (!$id) {
            http_response_code(404);
            echo json_encode(['error' => 'Product ID is required']);
            exit();
        }
    
        $ProductModel = new Product();
        $ProductModel->deleteProduct(['id' => $id]);
    
        http_response_code(200);
        echo json_encode(['success' => true]);
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

    public function productAddView() {
        include 'Public/ProductAdd.html';
        exit();
    }

    public function productDeleteView() {
        include 'Public/ProductDelete.html';
        exit();
    }

    public function productUpdateView() {
        include 'Public/ProductUpdate.html';
        exit();
    }
}
