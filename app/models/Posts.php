<?php

namespace models;

use core\App;
use core\Db;

class Posts
{
  public static function getAllPosts()
  {
    return getDb()->query('SELECT * from posts ORDER BY id DESC')->findAll();
  }

  public static function getRecentPosts()
  {
    return getDb()->query('SELECT * from posts ORDER BY id DESC LIMIT 5')->findAll();
  }

  public static function getPostById($id)
  {
    return getDb()->query('SELECT * from posts WHERE id=? LIMIT 1', [$id])->find();
  }

  public static function createPost(array $postData)
  {
    $query = "INSERT INTO posts (`title`,`content`,`excerpt`,`user_id`) VALUES (:title,:content,:excerpt,:user_id)";
    return getDb()->query($query, $postData);
  }

  public static function updatePost(array $postData)
  {
    $query = "UPDATE posts SET title=:title, excerpt=:excerpt, content=:content WHERE id=:id";
    return getDb()->query($query, $postData);
  }

  public static function deletePostById($id)
  {
    return getDb()->query("DELETE FROM posts WHERE id = ?", [$id]);
  }
}