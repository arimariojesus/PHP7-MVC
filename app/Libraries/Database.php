<?php

class Database {
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $db = 'framework';
  private $port = '';
  private $dbh;
  private $stmt;

  public function __construct()
  {
    // data source or DSN contains informations needed to connect to the database
    $dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
    $options = [
      // caches the connection for reuse, avoids overloading a new connection, resulting in a faster application
      PDO::ATTR_PERSISTENT => true,
      // throws a PDOException if an error occurs
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      // creates the PDO instance
      $this->dbh = new PDO($dsn, $this->user, $this->password, $options);

    } catch (PDOException $e) {
      echo "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function query($sql) {
    $this->stmt = $this->dbh->prepare($sql);
  }

  public function bind($param, $value, $type = null) {
    if (is_null($type)) {
      switch ($value) {
        case is_int($value):
          $type = PDO::PARAM_INT;
        break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
        break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
        break;
        default:
          $type = PDO::PARAM_STR;
        break;
      }

      $this->stmt->bindValue($param, $value, $type);
    }
  }

  public function exec() {
    return $this->stmt->execute();
  }

  public function result() {
    $this->exec();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function results() {
    $this->exec();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function countResults() {
    return $this->stmt->rowCount();
  }

  public function lastId() {
    return $this->dbh->lastInsertId();
  }

}



?>