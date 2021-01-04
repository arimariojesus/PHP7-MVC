<?php

class User {
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function register($data) {
    $this->db->query("INSERT INTO users(name, email, password) VALUES (:name, :email, :password)");
    $this->db->bind(":name", $data['name']);
    $this->db->bind(":email", $data['email']);
    $this->db->bind(":password", $data['password']);

    if($this->db->exec()) {
      return true;
    }else {
      return false;
    }
  }

  public function login($data) {
    $email = $data['email'];
    $password = $data['password'];

    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    if($this->db->result()) {
      $result = $this->db->result();

      if(password_verify($password, $result->password)) {
        return $result;
      }else {
        return false;
      }
    }else {
      return false;
    }
  }

  public function checkEmail($email) {
    $this->db->query("SELECT email FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    if($this->db->result()) {
      return true;
    }else {
      return false;
    }
  }
}

?>