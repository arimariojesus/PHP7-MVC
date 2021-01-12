<?php

class ShowImage {
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function show($id) {
    $id = (int) $id;

    $this->db->query("SELECT content, type FROM thumbnails WHERE post_id = :id");
    $this->db->bind(':id', $id);

    if($this->db->exec()) {
      $thumbnail = $this->db->result();

      if($thumbnail != null) {
        $image = [
          'type' => $thumbnail->type,
          'content' => $thumbnail->content
        ];
        return $image;
      }else {
        $image = [
          'type' => 'image/jpg',
          'content' => ''
        ];
        return $image;
      }
    }
  }
}