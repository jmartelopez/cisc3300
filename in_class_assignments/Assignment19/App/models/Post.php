<?php

namespace App\models;

class Post extends Model {

    public function getPosts($Title) {
        if ($Title) {
            $query = "select * from posts WHERE Title like :Title";
            return $this->fetchAllWithParams($query, ['Title' => '%' . $Title . '%']);
        }
        $query = "select * from posts";
        return $this->fetchAll($query);
    }

    public function getPostById($id){
        $query = "select * from posts where id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}