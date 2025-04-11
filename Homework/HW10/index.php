<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once "App/models/Model.php";
require_once "App/models/Product.php";
require_once "App/controllers/ProductController.php";

$env = parse_ini_file('.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use App\controllers\ProductController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

$productController = new ProductController();

if ($uriArray[1] === 'api' && $uriArray[2] === 'products') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if ($id) {
            $productController->getProductByID($id);
        } else {
            $productController->getAllProducts();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productController->createProduct();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'PUT' && $id) {
        $productController->updateProduct($id);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $idOrName = isset($uriArray[3]) ? $uriArray[3] : null; 

        if ($idOrName) {
            $productController->deleteProduct($idOrName); 
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Product ID or name is required']);
        }
    
        exit();
    }
    

    exit();
}

if ($uriArray[1] === 'products') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if ($id) {
            $productController->ProductDetailsView();
        } else {
            $productController->ProductView();
        }
    }
}

include 'Public/views/notFound.html';
exit();
?>
