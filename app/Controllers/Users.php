<?php

class Users extends Controller {

  public function register() {

    $data = [
      'name' => '',
      'email' => '',
      'password' => '',
      'confirm_password' => '',
      'name_error' => '',
    ];

    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if(isset($form)) {
      $data = [
        'name' => trim($form['name']),
        'email' => trim($form['email']),
        'password' => trim($form['password']),
        'confirm_password' => trim($form['confirm_password']),
      ];

      if(empty($form['name'])) {
        $data['name_error'] = 'Nome é obrigatório';
      }

      if(empty($form['email'])) {
        $data['email_error'] = 'E-mail é obrigatório';
      }

      if(empty($form['password'])) {
        $data['password_error'] = 'Informe a sua senha';
      }else if(strlen($form['password']) < 6 || strlen($form['password']) > 20) {
        $data['password_error'] = 'A senha deve ter entre 6 e 20 caracteres';
      }

      if(empty($form['confirm_password'])) {
        $data['confirm_password_error'] = 'Confirme a sua senha';
      }else if($form['password'] != $form['confirm_password']) {
        $data['confirm_password_error'] = 'As senhas não coincidem';
      }
    }

    $this->view('users/register', $data);
  }
}

?>