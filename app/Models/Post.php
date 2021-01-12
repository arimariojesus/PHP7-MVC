<?php

class Post {
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function readPosts() {
    $this->db->query("SELECT *,
      posts.id as postID,
      posts.created_in as postDateCreated,
      users.id as userId,
      users.created_in as userDateRegister
      FROM posts
      INNER JOIN users ON
      posts.user_id = users.id
      ");
    return $this->db->results();
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