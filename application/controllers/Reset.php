<?php

class Reset extends FrameWork {

  public function authenticate() {
    if (isset($_POST['mail'])) {
      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        if ($connect->emailExist($_POST['mail'])) {
          echo "You haven't registered yet, please register and try again";
        } else {
          echo "";
        }
      }
    }

    if (isset($_POST['key'])) {
      if ($this->model('OtpDataBase')) {
        $connect = new OtpDataBase();
        $key = (int)$_POST['key'];
        $result = $connect->getOtp($_POST['email']);
        if ($result) {
          if (!($key == $result)) {
            echo "Incorrect otp entered, try resend password";
          } else {
            echo "";
          }
        }
      }
    }
  }

  public function action() {
    if ($this->model('OtpDataBase')) {
      $connect = new OtpDataBase();
      $id = rand(10000, 99999);
      $otp = rand(1000, 9999);
      if ($connect->emailExist($id, $otp, $_POST['email'])) {
        if (Mail::otpSend($otp, $_POST['email'])) {
          echo "Type in the otp below";
        } else {
          echo "";
        }
      } else {
        echo "";
      }
    }
  }

}
