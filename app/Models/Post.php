<?php

class Post {
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function readPosts() {
    $this->db->query("SELECT *,
      posts.id as postId,
      posts.thumbnail as thumbnailContent,
      posts.thumbnail_type as thumbnailType,
      posts.created_in as postDateCreated,
      users.id as userId,
      users.created_in as userDateRegister
      FROM posts
      INNER JOIN users ON
      posts.user_id = users.id
      ORDER BY posts.created_in DESC
      ");
    return $this->db->results();
  }

  public function upload($data) {
    $this->db->query("INSERT INTO posts(user_id, thumbnail, thumbnail_type, title, text) VALUES (:user_id, :thumbnail, :thumbnail_type, :title, :text)");

    $this->db->bind(":thumbnail", $data['thumbnail']);
    $this->db->bind(":thumbnail_type", $data['thumbnail_type']);
    $this->db->bind(":user_id", $data['user_id']);
    $this->db->bind(":title", $data['title']);
    $this->db->bind(":text", $data['text']);

    if($this->db->exec()) {
      return true;
    }else {
      return false;
    }
  }

  public function update($data) {
    $this->db->query("UPDATE posts SET thumbnail = CASE WHEN :thumbnail != '' THEN :thumbnail ELSE thumbnail END,
                                       thumbnail_type = CASE WHEN :thumbnail != '' THEN :thumbnail_type ELSE thumbnail_type END, 
                                       title = :title, text = :text WHERE id = :id");

    $this->db->bind(":id", $data['id']);
    $this->db->bind(":thumbnail", $data['thumbnail']);
    $this->db->bind(":thumbnail_type", $data['thumbnail_type']);
    $this->db->bind(":title", $data['title']);
    $this->db->bind(":text", $data['text']);

    if($this->db->exec()) {
      return true;
    }else {
      return false;
    }
  }

  public function readSinglePost($id) {
    $this->db->query("SELECT * FROM posts WHERE id = :id");
    $this->db->bind(':id', $id);

    return $this->db->result();
  }

}