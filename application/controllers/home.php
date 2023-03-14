<?php

/**
 * 
 * home is a controller
 * 
 */

class home
{
  /**
   * 
   * index is a function which checks if login page is present in the views
   * folder and if it is present then the page is embedded
   * 
   */

  public function index() {
    if (file_exists('application/views/login.php')) {
      require_once 'application/views/login.php';
    }
  }

  /**
   * 
   * viewRegister is a function which checks if register page is present in the 
   * views folder and if it is present then the page is embedded
   * 
   */
  
  public function viewRegister() {
    if (file_exists('application/views/register.php')) {
      require_once 'application/views/register.php';
    }
  }
}