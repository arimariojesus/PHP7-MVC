<?php

class Users extends Controller {

  public function register() {

    $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if(isset($form)) {
      $data = [
        'name' => trim($form['name']),
        'email' => trim($form['email']),
        'password' => trim($form['password']),
        'confirm_password' => trim($form['confirm_password']),
      ];
    }else {
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
      ];
    }

    $this->view('users/register', $data);
  }
}

?>