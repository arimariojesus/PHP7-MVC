<?php

class Database {
  private $host = DB['HOST'];
  private $user = DB['USER'];
  private $password = DB['PASSWORD'];
  private $db = DB['BASE'];
  private $port = DB['PORT'];
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

  // executes an SQL statement
  public function query($sql) {
    $this->stmt = $this->dbh->prepare($sql);
  }

  // Binds a value to a parameter of the SQL statement
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
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  // execute prepared statement
  public function exec() {
    return $this->stmt->execute();
  }

  // gets a single record
  public function result() {
    $this->exec();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  // gets a set records
  public function results() {
    $this->exec();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // returns the number of rows affected by the last SQL statement
  public function countResults() {
    return $this->stmt->rowCount();
  }

  // returns the last ID entered in the database
  public function lastId() {
    return $this->dbh->lastInsertId();
  }

}



?>