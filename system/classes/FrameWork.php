<?php

class FrameWork {

  public function view($fileName) {
    if (file_exists('application/views/' . $fileName . '.php')) {
      require_once 'application/views/' . $fileName . '.php';
      return true;
    } else {
      $this->error('error');
      return false;
    }
  }
  
  public function model($fileName) {
    if (file_exists('application/models/' . ucfirst($fileName) . '.php')) {
      require_once 'application/models/' . ucfirst($fileName) . '.php';
      return true;
    } else {
      $this->error('error');
      return false;
    }
  }

  public function error($fileName) {
    if (file_exists('application/views/' . $fileName . '.html')) {
      require_once 'application/views/' . $fileName . '.html';
    }
  }

  public function redirect($path) {
    header('location: /' . $path);
  }
}
