<?php
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'response' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = [
        'name' => '15 prints',
        'price' => '$25'
    ];
    echo json_encode($response);
    exit();
}

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}

include 'homework-5.9.10.html'
?>
