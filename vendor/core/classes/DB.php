<?php

namespace core;
use PDOException;
use PDO;

class Db
{
    private $connection;
    private $stmt;

    public function __construct(array $db_config)
    {
        $dsn = "mysql:host={$db_config['host']};
        dbname={$db_config['dbname']};charset={$db_config['charset']}";
        try {
            $this->connection = new PDO(
                $dsn,
                $db_config['dbusername'],
                $db_config['dbpassword'],
                $db_config['options'],
            );
        } catch (PDOException $e) {
            die("Connection failed " . $e->getMessage());
        }
    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->connection->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function findAll()
    {
        return $this->stmt->fetchAll();
    }
}
;