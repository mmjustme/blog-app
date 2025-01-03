<?php

namespace core;

use PDOException;
use PDO;
use PDOStatement;

final class Db
{
  private $connection;
  private PDOStatement $stmt;
  private static $instance = null;

  private function __construct()
  {
  }

  private function __clone()
  {
  }

  public function __wakeup()
  {
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getConnection(array $db_config)
  {
    $host = $db_config['host'];
    $dbname = $db_config['dbname'];
    $charset = $db_config['charset'];
    $dbusername = $db_config['dbusername'];
    $dbpassword = $db_config['dbpassword'];
    $options = $db_config['options'];
    $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

    if ($this->connection instanceof PDO) {
      return $this;
    }

    try {
      $this->connection = new PDO($dsn, $dbusername, $dbpassword, $options);

      return $this;
    } catch (PDOException $e) {
      die("Connection to DB failed: " . $e->getMessage());
    }
  }

  public function query($query, $params = [])
  {
    try {
      $this->stmt = $this->connection->prepare($query);
      $this->stmt->execute($params);
    } catch (PDOException $e) {
      var_dump($e->getMessage());
      abort(500);
    }

    return $this;
  }

  public function findAll()
  {
    return $this->stmt->fetchAll();
  }

  public function find()
  {
    return $this->stmt->fetch();
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }

  public function getColumn()
  {
    return $this->stmt->fetchColumn();
  }

  public function getInsertId()
  {
    return $this->connection->lastInsertId();
  }
}