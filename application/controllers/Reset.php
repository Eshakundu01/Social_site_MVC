<?php

/**
 * 
 * Reset is a controller which extends properties from FrameWork class.
 * 
 */
class Reset extends FrameWork {
  /**
   * 
   * This checks if email is a registered mail by validating from the database.
   * It checks the otp entered is correct by validating with the database.
   * 
   * @return void
   */
  public function authenticate() {
    if (isset($_POST['mail'])) {
      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        if (!($connect->emailExist($_POST['mail']))) {
          $message['error'] = "You haven't registered yet, please register and try again";
        } else {
          $message['error'] = false;
        }
        echo json_encode($message);
      }
    }

    if (isset($_POST['key'])) {
      if ($this->model('OtpDataBase')) {
        $connect = new OtpDataBase();
        $key = (int)$_POST['key'];
        $result = $connect->getOtp($_POST['email']);
        if ($result) {
          if (!($key == $result)) {
            $message['error'] = "Incorrect otp entered, try resend password";
          } else {
            $message['error'] = false;
          }
        }
        echo json_encode($message);
      }
    }
  }

  /**
   * 
   * This generates a random four digit pin inserts into the database and sends
   * mail to the respective mail address containing the same pin.
   * 
   * @return void
   */
  public function action() {
    if ($this->model('OtpDataBase')) {
      $connect = new OtpDataBase();
      $id = rand(10000, 99999);
      $otp = rand(1000, 9999);
      if ($connect->emailExist($id, $otp, $_POST['email'])) {
        if (Mail::otpSend($otp, $_POST['email'])) {
          $message['status'] = true;
        } else {
          $message['status'] = false;
        }
      } else {
        $message['status'] = false;
      }
      echo json_encode($message);
    }
  }

  /**
   * 
   * This updates the password in the database.
   * 
   * @return void
   */
  public function change() {
    if ($this->model('UserDatabase')) {
      $connect = new UserDatabase();
      $pass = Password::encrypt($_POST['password']);
      if ($connect->updatePassword($pass, $_POST['email'])) {
        $message['status'] = true;
      } else {
        $message['status'] = false;
      }
      echo json_encode($message);
    }
  }
}
