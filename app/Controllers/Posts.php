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

      if(in_array('', $form)) {
        if(empty($form['title'])) {
          $data['title_error'] = 'Título é obrigatório';
        }
  
        if(empty($form['text'])) {
          $data['text_error'] = 'Texto é obrigatório';
        }
      }else {
        if(isset($_FILES['thumbnail'])) {
          $thumbnail = $_FILES['thumbnail'];
          $maxSizeInMB = 5;
  
          if(Image::checkFile($thumbnail, $maxSizeInMB) != '') {
            $data['thumbnail_error'] = Image::checkFile($thumbnail, $maxSizeInMB);
          }else {
            $data['thumbnail'] = file_get_contents($thumbnail['tmp_name']);
            $data['thumbnail_type'] = $thumbnail['type'];

            // $data['thumbnail_error'] = '';

            if($this->modelPost->upload($data)) {
              Session::message('post', 'Post cadastrado com sucesso');
              Url::redirect('posts');
            }else {
              die("Erro ao armazenar post no banco de dados");
            }
          }
        }else {
          $data['thumbnail_error'] = 'Escolha uma imagem para servir como thumbnail';
        }
      }
    }else {
      $data = [
        'thumbnail' => '',
        'thumbnail_type' => '',
        'title' => '',
        'text' => '',
        'thumbnail_error' => '',
        'title_error' => '',
        'text_error' => '',
      ];
    }

    $this->view('posts/register', $data);
  }
}
