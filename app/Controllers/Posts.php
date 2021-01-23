<?php

class Posts extends Controller {

  public function __construct()
  {
    if(!Session::isLoggedIn()) {
      URL::redirect('users/login');
    }

    $this->modelPost = $this->model('Post');
    $this->modelUser = $this->model('User');
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

  public function edit($id) {

    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $post = $this->modelPost->readSinglePost($id);

    if(isset($form)) {
      $data = [
        'id' => trim($id),
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
        if($_FILES['thumbnail']['tmp_name'] != '') {
          $thumbnail = $_FILES['thumbnail'];
          $maxSizeInMB = 5;
  
          if(Image::checkFile($thumbnail, $maxSizeInMB) != '') {
            $data['thumbnail_error'] = Image::checkFile($thumbnail, $maxSizeInMB);
          }else {
            $data['thumbnail'] = file_get_contents($thumbnail['tmp_name']);
            $data['thumbnail_type'] = $thumbnail['type'];
          }
        }else {
          $data['thumbnail'] = '';
          $data['thumbnail_type'] = '';
        }
        
        if($this->modelPost->update($data)) {
          Session::message('post', 'Post atualizado com sucesso');
          Url::redirect('posts');
        }else {
          die("Erro ao atualizar post");
        }
      }
    }else {

      if($post->user_id != $_SESSION['user_id']) {
        Session::message('post', 'Você não tem autorização para editar esse post', 'alert alert-danger');
        Url::redirect('posts');
      }

      $data = [
        'thumbnail' => $post->thumbnail,
        'thumbnail_type' => '',
        'id' => $post->id,
        'title' => $post->title,
        'text' => $post->text,
        'thumbnail_error' => '',
        'title_error' => '',
        'text_error' => '',
      ];
    }

    $this->view('posts/edit', $data);
  }

  public function show($id) {
    $post = $this->modelPost->readSinglePost($id);
    $user = $this->modelUser->readUserForId($post->user_id);

    $data = [
      'post' => $post,
      'user' => $user,
    ];

    $this->view('posts/show', $data);
  }

  public function delete($id) {
    if($this->checkOwner($id)) {
      $id = filter_var($id, FILTER_VALIDATE_INT);
      $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

      if($id && $method === 'POST') {
        if($this->modelPost->delete($id)) {
          Session::message('post', 'Post deletado com sucesso');
          Url::redirect('posts');
        }
      }else {
        Session::message('post', 'Erro ao deletar o post', 'alert alert-danger');
        Url::redirect('posts');
      }
    }else {
      Session::message('post', 'Você não tem autorização para editar esse post', 'alert alert-danger');
      Url::redirect('posts');
    }
  }

  private function checkOwner($id) {
    $post = $this->modelPost->readSinglePost($id);

    if($post->user_id != $_SESSION['user_id'])
      return false;

    return true;
  }

}
