<?php

/**
 * 
 * FrameWork is a class that contains functions related to using files in view,
 * model.
 * 
 */
class FrameWork {
  /**
   * 
   * It requires the file if the file exists in the view folder.
   * 
   * @param string $fileName the name of the file.
   * @return void
   */
  public function view($fileName) {
    if (file_exists('application/views/' . $fileName . '.php')) {
      require_once 'application/views/' . $fileName . '.php';
    } else {
      $this->error('error');
    }
  }
  
  /**
   * 
   * It requires the file if the file exists in the model folder.
   * 
   * @param string $fileName the name of the file.
   * @return boolean
   */
  public function model($fileName) {
    if (file_exists('application/models/' . ucfirst($fileName) . '.php')) {
      require_once 'application/models/' . ucfirst($fileName) . '.php';
      return true;
    } else {
      $this->error('error');
      return false;
    }
  }

  /**
   * 
   * It requires the html file if the file exists. This is a custom error page.
   * 
   * @param string $fileName the name of the file.
   * @return void
   */
  public function error($fileName) {
    if (file_exists('application/views/' . $fileName . '.html')) {
      require_once 'application/views/' . $fileName . '.html';
    }
  }

  /**
   * 
   * It uses the header function to redirect to that page.
   * 
   * @param string $path the path where the it is to be redirected. 
   * @return void
   */
  public function redirect($path) {
    header('location: /' . $path);
  }
}
