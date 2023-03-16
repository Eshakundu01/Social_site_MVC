<?php

class Register {

  /**
   * 
   * It checks if register page is present in the views folder and 
   * if it is present then the page is embedded.
   * 
   * @return void
   */
  
  public function signup() {
    if (file_exists('application/views/register.php')) {
      require_once 'application/views/register.php';
      if (CheckInput::checkName() == false && CheckInput::checkMail() == false && CheckInput::checkBirthDay() == false && CheckInput::checkPass() == false) {
        
      }
    }
  }
}