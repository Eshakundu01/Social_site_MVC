<?php

/**
 * 
 * home is a controller
 * 
 */

class Home extends FrameWork {
  /**
   * 
   * It checks if login page is present in the views
   * folder and if it is present then the page is embedded.
   * 
   * @return void
   */

  public function index() {
    $this->view('login');
  }

  public function forgot() {
    $this->view('forgot');
  }

  public function registered() {
    $this->error('registered');
  }

  public function page() {
    $this->error('error');
  }

  public function login() {
    if (isset($_POST['login'])) {
      $this->view('home');
    }
  }
}
