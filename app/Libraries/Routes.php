<?php
/*
 * Class Routes
 * Creates the URL, loads the controllers, méthods and parameters
 * FORMAT URL : /controller/method/parameters
*/

class Routes {

  private $controller = 'Pages';
  private $method = 'index';
  private $params = [];

  public function __construct()
  {
    $url = $this->url() ? $this->url() : [0];

    //ucwords - capitalize the first character of each word
    if(file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) {
      $this->controller = ucwords($url[0]);
      //unset - destroys the specified variable
      unset($url[0]);
    }

    // Requires the controller
    require_once('../app/Controllers/' . $this->controller . '.php');
    // instantiate the controller e.g: new Pages();
    $this->controller = new $this->controller;

    if(isset($url[1])) {
      //method_exists - checks if the method exists in the class
      if(method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    $this->params = $url ? array_values($url) : [];
    //call_user_func_array - calls a given user function with an array of parameters
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  private function url() {
    //FILTER_SANITIZE_URL removes all illegal characters from a URL
    $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
    if(isset($url)) {
      $url = trim(rtrim($url, '/'));
      $url = explode('/', $url);

      return $url;
    }
    return null;
  }
}

?>