<?php

class Users extends Controller {
  private $modelUser;

  public function __construct()
  {
    $this->modelUser = $this->model('User');
  }

  public function register() {

    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($form)) {
      $data = [
        'name' => trim($form['name']),
        'email' => trim($form['email']),
        'password' => trim($form['password']),
        'confirm_password' => trim($form['confirm_password'])
      ];

      if(in_array('', $form)) {
        if(empty($form['name'])) {
          $data['name_error'] = 'Nome é obrigatório';
        }
  
        if(empty($form['email'])) {
          $data['email_error'] = 'E-mail é obrigatório';
        }
  
        if(empty($form['password'])) {
          $data['password_error'] = 'Informe a sua senha';
        }
  
        if(empty($form['confirm_password'])) {
          $data['confirm_password_error'] = 'Confirme a sua senha';
        }
      }else {
        if(Validator::checkName($form['name'])) {
          $data['name_error'] = 'O nome informado é inválido';
        }else if(strlen($form['password']) < 6 || strlen($form['password']) > 20) {
          $data['password_error'] = 'A senha deve ter entre 6 e 20 caracteres';
        }else if(Validator::checkEmail($form['email'])) {
          $data['email_error'] = 'O email informado é inválido';
        }else if($this->modelUser->checkEmail($data['email'])) {
          $data['email_error'] = 'E-mail já cadastrado';
        }else if($form['password'] != $form['confirm_password']) {
          $data['confirm_password_error'] = 'As senhas não coincidem';
        }else {
          $data['password'] = password_hash($form['password'], PASSWORD_DEFAULT);

          if($this->modelUser->register($data)) {
            Session::message('register', 'Cadastro realizado com sucesso');
            Url::redirect('users/login');
          }else {
            die("Erro ao armazenar usuário no banco de dados");
          }
        }
      }
    }else {
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => '',
      ];
    }

    $this->view('users/register', $data);
  }
  
  public function login() {
    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($form)) {
      $data = [
        'email' => trim($form['email']),
        'password' => trim($form['password']),
      ];

      if(in_array('', $form)) {
        if(empty($form['email'])) {
          $data['email_error'] = 'E-mail é obrigatório';
        }
  
        if(empty($form['password'])) {
          $data['password_error'] = 'Informe a sua senha';
        }
      }else {
        if(Validator::checkEmail($form['email'])) {
          $data['email_error'] = 'O email informado é inválido';
        }else {

          $user = $this->modelUser->login($data);

          if($user) {
            $this->createSessionUser($user);
          }else {
            Session::message('login', 'E-mail ou senha inválidos', 'alert alert-danger');
          }
        }
      }
    }else {
      $data = [
        'email' => '',
        'password' => '',
        'email_error' => '',
        'password_error' => '',
      ];
    }

    $this->view('users/login', $data);
  }

  private function createSessionUser($user) {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_name'] = $user->name;
    $_SESSION['user_email'] = $user->email;

    URL::redirect('posts');
  }

  public function exit() {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    
    session_destroy();

    Url::redirect('users/login');
  }
}

?>