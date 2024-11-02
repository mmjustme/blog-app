<?php

namespace models;

use core\App;
use core\Db;

class Users
{
  public static function getUserByEmail($email)
  {
    return getDb()->query('SELECT * from users WHERE email=?', [$email])->find();
  }

  public static function createUser($data)
  {
//    getDb()->query("INSERT INTO users (`name`,`email`,`password`)
//    VALUES (:name,:email,:password)", $data)
    $query = 'INSERT INTO users (`name`,`email`,`password`) VALUES (:name,:email,:password)';
    return getDb()->query($query, $data);
  }

}