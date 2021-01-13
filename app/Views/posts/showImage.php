<?php

class ShowImage {
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function show($postId, $userId) {
    $postId = (int) $postId;
    $userId = (int) $userId;

    $this->db->query("SELECT content, type FROM thumbnails WHERE post_id = :postId && user_id = :userId");
    $this->db->bind(':postId', $postId);
    $this->db->bind(':userId', $userId);

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