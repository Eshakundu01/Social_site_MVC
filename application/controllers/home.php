<?php

class home 
{
  public function __construct() {
    if (file_exists('application/views/login.php')) {
      require_once 'application/views/login.php';
    }
  }
}