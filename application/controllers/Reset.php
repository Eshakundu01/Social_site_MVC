<?php

class Reset extends Framework {

  public function authenticate() {
    if (isset($_POST['mailid'])) {
      if ($this->model('Database')){
        $connect = new Database();
        if ($connect->verifyEmail($_POST['mailid'])) {
          echo "You haven't registered yet, please register and try again";
        } else {
          echo "";
        }
      }
    }
  }
}