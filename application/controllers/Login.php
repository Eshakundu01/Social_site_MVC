<?php

/**
 * 
 * Login is a controller which extends properties from FrameWork class.
 * 
 */
class Login extends FrameWork {
  /**
   * 
   * This checks if email is a registered mail by validating from the database.
   * Similarly, it checks for password.
   * 
   * @return void
   */
  public function authenticate() {
    if (isset($_POST['mailid'])) {
      if ($this->model('UserDatabase')){
        $connect = new UserDatabase();
        if (!($connect->emailExist($_POST['mailid']))) {
          $message['error'] = "You haven't registered yet, please register and try again";
        } else {
          $message['error'] = false;
        }
        echo json_encode($message);
      }
    }

    if (isset($_POST['code'])) {
      if ($this->model('UserDatabase')){
        $connect = new UserDatabase();
        $pass = Password::encrypt($_POST['code']);
        if (!($connect->passwordExist($pass))) {
          $message['error'] = "You've entered incorrect password. Forgotten password?";
        } else {
          $message['error'] = false;
        }
        echo json_encode($message);
      }
    }
  }
}
