<?php

class Reset extends FrameWork {

  public function authenticate() {
    if (isset($_POST['mail'])) {
      if ($this->model('Database')){
        $connect = new Database();
        if ($connect->emailExist($_POST['mail'])) {
          echo "You haven't registered yet, please register and try again";
        } else {
          echo "";
        }
      }
    }
  }

  public function action() {
    if ($_POST['submit']) {

    }
  }
}