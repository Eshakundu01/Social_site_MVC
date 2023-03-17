<?php

class Register extends FrameWork {

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
        if (Mail::registrationMail($_POST['mail'])) {
          if ($this->model('database')) {
            $table = new Database();
            $password = Password::encrypt($_POST['code']);
            try {
              $result = $table->insertUserInfo($_POST['name'], $_POST['mail'], $_POST['dob'], $_POST['gender'], $password);
              if ($result) {
                $this->redirect('login');
              }
            } catch (Exception $e) {
              $this->error('error');
            }
          } else {
            $this->error('error');
          }
        } else {
          $this->error('error');
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
