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
    } else {
      $this->view('login');
    }
  }

  public static function checkPassword() {
    if (isset($_POST['reset'])) {

      // Validate password provided by the user
      if (empty($_POST['key'])) {
        return "Password field cannot be empty, please fill in and try again";
      } else {
        $uppercase = preg_match('@[A-Z]@', $_POST['key']);
        $lowercase = preg_match('@[a-z]@', $_POST['key']);
        $number = preg_match('@[0-9]@', $_POST['key']);
        $specialChars = preg_match('@[^\w]@', $_POST['key']);
    
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['key']) < 8) {
          return 'Password should be at least 8 characters in length and should include at least 
          one upper case letter, one number, and one special character, please provide a strong 
          password and register with us';
        } else {
          return false;
        }
      }
    }
  }
}
