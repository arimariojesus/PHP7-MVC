<?php
/*
 * Controller base
 * Loads models and views
*/

class Controller {

  public function model($model) {
    require_once '../app/Models/' . $model . '.php';
    return new $model;
  }

  public function view($view, $data = []) {
    $file = ('../app/Views/' . $view . '.php');
    if(file_exists($file)) {
      require_once $file;
    }else {
      die('File of view not exists!');
    }
  }

}

?>