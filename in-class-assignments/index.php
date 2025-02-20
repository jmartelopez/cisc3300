<?php

header("Access-Control-Allow-Origin: *");


$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'cats' && $_SERVER['REQUEST_METHOD'] === 'GET') {

    $button = [
        'message' => 'Hi! Have a great day!'
    ];

    echo json_encode($button);
    exit();
}
?>
