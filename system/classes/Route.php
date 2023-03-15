<?php

/**
 * 
 * It separates the controller, methods and parameters from the url
 * 
 */

class Route {
  /**
   * 
   * @var string
   * Stores the controller name, it initially consists of default value home.
   * 
   */

  protected $controller = "Home";

  /**
   * @var string 
   * Stores the method name, it initially consists of default value index.
   * 
   */

  protected $method = "index";

  /**
   * 
   * @var array
   * Stores parameters that are passed in the url.
   * 
   */
  protected $param = [];
  
  /**
   * 
   * This separates the controller name, method name and parameters and stores
   * in the variables, after that the callback function is used.
   * 
   * @return void
   */

  public function __construct() {
    $url = $this->parse();

    if (file_exists('application/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once 'application/controllers/' . $this->controller . '.php';

    $this->controller = new $this->controller;

    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    $this->param = $url ? array_values($url) : [];

    call_user_func_array([$this->controller, $this->method], $this->param);
  }

  /**
   * 
   * Accesses the part after the base url, 
   * then removes the whitespaces and special characters 
   * after that stores the contents in an array.
   * 
   * @return array
   * 
   */
  
  public function parse() {
    return explode('/', ucfirst(filter_var(trim($_SERVER['REQUEST_URI'], '/'), FILTER_SANITIZE_URL)));
  }   
}
