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
      session_start();
      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        if ($connect->getAllData($_POST['email'])) {
          $result = $connect->getAllData($_POST['email']);
          $key = Password::decrypt($result['passcode']);
          $_SESSION['user'] = [
            'name' => $result['name'],
            'mail' => $result['email'],
          ];
          $this->redirect('home/dashboard');
        }
      }
    }
  }

  /**
   * 
   * It views the forgot password page.
   * 
   * @return void
   */
  public function forgot() {
    $this->view('forgot');
  }

  /**
   * 
   * It views a page if the user has already registered.
   * 
   * @return void
   */
  public function registered() {
    $this->error('registered');
  }

  /**
   * 
   * It views the error page if page not found.
   * 
   * @return void
   */
  public function page() {
    $this->error('error');
  }

  /**
   * 
   * It views the dashboard or the wall page if anonymous users enters, the 
   * login page is viewed.
   * 
   * @return void
   */
  public function dashboard() {
    session_start();
    if (isset($_SESSION['user']['name'])) {
      $this->view('home');
      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        $row = $connect->getAllData($_SESSION['user']['mail']);
        if ($row) {
          $key = Password::decrypt($row['passcode']);
          $_SESSION['users'] = [
            'birthday' => $row['dob'],
            'gender' => $row['gender'],
            'password' => $key
          ];
        }
      }
    } else {
      $this->redirect('home/index');
    }
  }

  /**
   * 
   * This is the logout part which destroys the session and unsets the values,
   * then redirects to the login page.
   * 
   * @return void
   */
  public function logout() {
    session_start();
    session_unset();
    session_destroy();
    $this->redirect('home/index'); 
  }

  /**
   * 
   * It views the profile page of the user that consists of user information 
   * which can be edited.
   * 
   * @return void
   */
  public function profile() {
    session_start();
    if (!(isset($_SESSION['user']['name']))) {
      $this->redirect('home/index');
    } else {
      $this->view('profile');
    }
  }

  /**
   * 
   * It views the delete page which confirms user to delete account.
   * 
   * @return void
   */
  public function delete() {
    $this->view('delete');
  }
}
