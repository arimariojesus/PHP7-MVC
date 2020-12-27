<?php

class Pages extends Controller{
  
  public function index() {
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