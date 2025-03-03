<?php

header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'json' && $_SERVER['REQUEST_METHOD'] === 'GET') {

        $json = [
            'message' => 'Hi! Have a great day!'
        ];
    
        echo $json['message'];
        exit();
    }

else if ($uriArray[1] === 'html' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    echo '
        <div>
            <p>Have a great weekend</p>
        </div>
    ';
}
?>
