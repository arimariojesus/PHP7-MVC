<?php

class Posts extends Controller {

  public function __construct()
  {
    if(!Session::isLoggedIn()) {
      URL::redirect('users/login');
    }

    $this->modelPost = $this->model('Post');
  }
  
  public function index() {
    $data = [
      'posts' => $this->modelPost->readPosts(),
    ];

    $this->view('posts/index', $data);
  }

  public function register() {

    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($form)) {
      $data = [
        'title' => trim($form['title']),
        'text' => trim($form['text']),
        'user_id' => $_SESSION['user_id'],
      ];

      if(isset($_FILES['thumbnail'])) {
        $thumbnail = $_FILES['thumbnail'];
        $maxSizeInMB = 5;

        if(Image::checkFile($thumbnail, $maxSizeInMB) != '') {
          $data['thumbnail_error'] = Image::checkFile($thumbnail, $maxSizeInMB);
        }else {
          $data['thumbnail'] = [
            'name' => $thumbnail['name'],
            'content' => file_get_contents($thumbnail['tmp_name']),
            'type' => $thumbnail['type'],
            'size' => $thumbnail['size'],
          ];
        }
      }

      if(in_array('', $form)) {
        if(empty($form['title'])) {
          $data['title_error'] = 'Título é obrigatório';
        }
  
        if(empty($form['text'])) {
          $data['text_error'] = 'Texto é obrigatório';
        }
      }else {
        if($this->modelPost->upload($data)) {
          Session::message('post', 'Post cadastrado com sucesso');
          Url::redirect('posts');
        }else {
          die("Erro ao armazenar post no banco de dados");
        }
      }
    }else {
      $data = [
        'thumbnail' => [],
        'title' => '',
        'text' => '',
        'title_error' => '',
        'text_error' => '',
        'thumbnail_error' => '',
      ];
    }

    $this->view('posts/register', $data);
  }
}
