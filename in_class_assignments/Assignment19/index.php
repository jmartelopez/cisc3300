<?php
require_once "App/models/Model.php";
require_once "App/models/Post.php";
require_once "App/controllers/PostController.php";


$env = parse_ini_file('.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use App\controllers\PostController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');


$uriArray = explode("/", $uri);


if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController = new PostController();

    if ($id) {
        $postController->getPostByID($id);
    } else {
        $postController->getPosts();
    }
}

if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $postController = new PostController();

    if ($id) {
        $postController->PostDetailsView();
    } else {
        $postController->PostsView();
    }

}

include 'Public/views/notFound.html';
exit();

?>