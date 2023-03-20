<?php

class Login extends FrameWork {

  public function authenticate() {
    if (isset($_POST['mailid'])) {
      if ($this->model('Database')){
        $connect = new Database();
        if ($connect->emailExist($_POST['mailid'])) {
          echo "You haven't registered yet, please register and try again";
        } else {
          echo "";
        }
      }
    }

    if (isset($_POST['code'])) {
      if ($this->model('Database')){
        $connect = new Database();
        $pass = Password::encrypt($_POST['code']);
        if ($connect->passwordExist($pass)) {
          echo "You've entered incorrect password. Forgotten password?";
        } else {
          echo "";
        }
      }
    }
  }
}