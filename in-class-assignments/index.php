<?php

header("Access-Control-Allow-Origin: *");


$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'response' && $_SERVER['REQUEST_METHOD'] === 'GET') {

    $button = [

        'message' => 'DATA FROM PHP'
    ];

    echo json_encode($button);
    exit();
}
include 'in-class-13.html'
?>