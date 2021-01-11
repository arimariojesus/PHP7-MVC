<?php

class Post {
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function upload($data) {
    $this->db->query("INSERT INTO posts(user_id, title, text) VALUES (:user_id, :title, :text)");
    $this->db->bind(":user_id", $data['user_id']);
    $this->db->bind(":title", $data['title']);
    $this->db->bind(":text", $data['text']);

    if($this->db->exec()) {
      return true;
    }else {
      return false;
    }
  }

}