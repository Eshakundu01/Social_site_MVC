<?php

/**
 * 
 * Home is a controller which extends properties from FrameWork class.
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

    if (isset($_POST['login'])) {
      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        if ($connect->getName($_POST['email'])) {
          $_SESSION['user'] = $connect->getName($_POST['email']);
          $this->redirect('home/dashboard');
        }
      }
    }
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

  public function dashboard() {
    $this->view('home');
    if (!(isset($_SESSION['user']))) {
      $this->redirect('home/index');
    }
  }

  public function logout() {
    session_start();
    session_unset();
    session_destroy();
    $this->redirect('home/index'); 
  }

  public function profile() {
    $this->view('profile');
  }

  public function delete() {
    $this->view('delete');
  }
}
