<?php

namespace App\controllers;

use App\models\Post;

class PostController
{
    public function getPosts() {
        $PostModel = new Post();
        $query = !empty($_GET['Title']) ? $_GET['Title'] : null;
        $posts = $PostModel->getPosts($query);
        echo json_encode($posts);
        exit();
    }

    public function getPostByID($id) {
        $PostModel = new Post();
        $Post = $PostModel->getPostById($id);
        echo json_encode($posts);
        exit();
    }

    public function PostsView() {
        include 'Public/Post.html';
        exit();
    }

    public function PostDetailsView() {
        include 'Public/PostDetails.html';
        exit();
    }

}