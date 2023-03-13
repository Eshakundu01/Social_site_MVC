<?php

class route 
{
  protected $controller = "home";
  protected $method = "index";
  protected $param = [];
  
  public function __construct() {
    $url = $this->parse();

    if (file_exists('application/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once 'application/controllers/' . $this->controller . '.php';

    $this->controller = new $this->controller;
  }

  public function parse() {
    return explode('/',filter_var(trim($_SERVER['REQUEST_URI'],'/'),FILTER_SANITIZE_URL));
  }
    
}
?>