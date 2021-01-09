<?php

class Posts extends Controller {

  public function __construct()
  {
    if(!Session::isLoggedIn()) {
      URL::redirect('users/login');
    }
  }
  
  public function index() {
    $this->view('posts/index');
  }

  public function register() {

    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($form)) {
      $data = [
        'title' => trim($form['title']),
        'text' => trim($form['text']),
      ];

      if(in_array('', $form)) {
        if(empty($form['title'])) {
          $data['title_error'] = 'Título é obrigatório';
        }
  
        if(empty($form['text'])) {
          $data['text_error'] = 'Texto é obrigatório';
        }
      }else {
        echo "Pode cadastrar o post";
      }
    }else {
      $data = [
        'title' => '',
        'text' => '',
        'title_error' => '',
        'text_error' => '',
      ];
    }

    var_dump($form);

    $this->view('posts/register', $data);
  }
}
