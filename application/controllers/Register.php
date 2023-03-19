<?php

class Register extends FrameWork {

  public function index() {

  }

  /**
   * 
   * It checks if error is present in the page or not and accordingly  
   * if it is present then the page is embedded.
   * 
   * @return void
   */
  
  public function signup() {
    $this->view('register');
    if (isset($_POST['register'])) {
      if (!(Register::errorCheck())) {
        if ($this->model('database')) {
          $table = new Database();
          $password = Password::encrypt($_POST['code']);

          if (!(isset($_POST['geneder']))) {
            $gender = "";
          } else {
            $gender = $_POST['gender'];
          }

          try {
            $result = $table->insertUserInfo($_POST['name'], $_POST['mail'], $_POST['dob'], $gender, $password);
            if ($result) {
              if (Mail::registrationMail($_POST['mail'])) {
                $this->redirect('home/index');
              } else {
                $this->redirect('home/page');
              }
            }
          } catch (Exception $e) {
            $this->redirect('home/registered');
          }
        } else {
          $this->redirect('home/page');
        }
      }
    }
  }
  
  public static function errorCheck() {
    if (CheckInput::checkName()) { 
      return CheckInput::checkName();
    } elseif (CheckInput::checkMail()) {
      return CheckInput::checkMail();
    } elseif (CheckInput::checkBirthDay()) {
      return CheckInput::checkBirthDay();
    } elseif (CheckInput::checkPass()) {
      return CheckInput::checkPass();
    } else {
      return false;
    }
  }
}
