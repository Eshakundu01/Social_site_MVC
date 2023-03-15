<?php

/**
 * 
 * home is a controller
 * 
 */

class Home {
  /**
   * 
   * It checks if login page is present in the views
   * folder and if it is present then the page is embedded.
   * 
   * @return void
   */

  public function index() {
    if (file_exists('application/views/login.php')) {
      require_once 'application/views/login.php';
    }
  }

  /**
   * 
   * It checks if register page is present in the views folder and 
   * if it is present then the page is embedded.
   * 
   * @return void
   */
  
  public function register() {
    if (file_exists('application/views/register.php')) {
      require_once 'application/views/register.php';
    }
  }
}
