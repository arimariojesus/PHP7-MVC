<?php

class Pages extends Controller{
  
  public function index() {
    if(Session::isLoggedIn()) {
      URL::redirect('posts');
    }

    $data = [
      'titlePage' => 'Home Page'
    ];

    $this->view('pages/home', $data);
  }

  public function about() {
    $data = [
      'titlePage' => 'About Us Page'
    ];

    $this->view('pages/about', $data);
  }
}

?>