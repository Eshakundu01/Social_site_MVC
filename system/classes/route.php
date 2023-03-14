<?php

/**
 * route class which separates the controller, methods and parameters from
 * the url
 * 
 */

class route 
{
  /**
   * 
   * @var $controller: stores the controller name
   * it initially consists of default value home
   * @var $method: stores the method name
   * it initially consists of default value index
   * @var $param: stores parameters that are passed in the url
   * 
   */

  protected $controller = "home";
  protected $method = "index";
  protected $param = [];
  
  /**
   * 
   * constructor
   * 
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
   * access the part after the base url, 
   * then removes the whitespaces and special characters 
   * after that stores the contents in an array
   * 
   */
  
  public function parse() {
    return explode('/',filter_var(trim($_SERVER['REQUEST_URI'],'/'),FILTER_SANITIZE_URL));
  }
    
}
?>