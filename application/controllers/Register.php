<?php

/**
 * 
 * Register is a controller which extends properties from FrameWork class.
 * 
 */
class Register extends FrameWork {
  /**
   * 
   * It checks if error is present in the page or not and accordingly  
   * if it is not present then data is inserted into the database and an email
   * is sent to the respective mail address.
   * 
   * @return void
   */ 
  public function signup() {
    $this->view('register');
    if (isset($_POST['register'])) {
      if (!(Register::checkName() || Register::checkMail() || Register::checkBirthDay() || Register::checkPass())) {
        if ($this->model('userDatabase')) {
          $table = new UserDatabase();
          $password = Password::encrypt($_POST['code']);

          if (!(isset($_POST['gender']))) {
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

  /**
   * 
   * This is a static function that checks the name is field is empty, matches 
   * the pattern of only alphabets and whitespaces are allowed.
   * 
   * @static
   * @return mixed
   */
  public static function checkName() {
    if (isset($_POST['register'])) {

      // Validate full name
      if (empty($_POST['name'])) {
        return "Name field cannot be empty, please fill in and try again";
      } elseif (!preg_match("/^[a-zA-Z-' ]+$/", $_POST['name'])) {
        return "Only alphabets and whitespace are allowed, correct it, then register with us!";
      } else {
        return false;
      }
    }
  }

  /**
   * 
   * This checks the mail field is empty, correct format of email address is 
   * provided and lastly verified using API.
   * 
   * @static
   * @return void
   */
  public static function checkMail() {
    if (isset($_POST['register'])) {

      // Validate email address
      if (empty($_POST['mail'])) {
        return "Email field cannot be empty, please fill in and try again";
      } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format is used please correct it, then register with us!";
      } else {
        // if (Mail::verifyMail($_POST['mail'])) {
        //   return "Not a vaild email address provided. Provide a valid email and register with us!";
        // } else {
        //   return false;
        // }
      }
    }
  }

  /**
   * 
   * This checks if date of birth provided is current date, in current year or
   * current month, if it is a future date or if the user qualifies the
   * valid age.
   * 
   * @static
   * @return mixed
   */
  public static function checkBirthDay() {
    if (isset($_POST['register'])) {

      // Validate the date provided by the user
      if (empty($_POST['dob'])) {
        return "Date of birth field cannot be empty, please fill in and try again";
      } else {
        $date = explode('-', $_POST['dob']);

        $year = (int)$date[0];
        $currentyear = (int)date('Y');
        $valid_year = $currentyear - 12;

        $month = (int)$date[1];
        $currentmonth = (int)date('m');

        $date = (int)$date[2];
        $currentdate = (int)date('d');

        if ($_POST['dob'] == date('Y-m-d')) {
          return "Date of birth cannot be today's date, enter your date of birth and register with us!";
        } elseif (($year == $currentyear && $month < $currentmonth) || ($year == $currentyear && $month == $currentmonth) || ($year == $currentyear && $month > $currentmonth)) {
          return "Date of birth cannot be in present year, enter your date of birth and register with us!";
        } elseif ($year == $currentyear && $month == $currentmonth && $date > $currentdate) {
          return "Date of birth cannot be future date, enter your date of birth and register with us!";
        } elseif ($year > $valid_year) {
          return "Too young to register with us!You must be atleast 12 years old";
        } else {
          return false;
        }
      }
    }
  }

  /**
   * 
   * This checks if the password field is empty, matches the format of atleast 
   * one uppercase letter, one lowercase letter, one digit and special character
   * and lastly if the length is minimum 8 letters.
   * 
   * @static
   * @return void
   */
  public static function checkPass() {
    if (isset($_POST['register'])) {

      // Validate password provided by the user
      if (empty($_POST['code'])) {
        return "Password field cannot be empty, please fill in and try again";
      } else {
        $uppercase = preg_match('@[A-Z]@', $_POST['code']);
        $lowercase = preg_match('@[a-z]@', $_POST['code']);
        $number = preg_match('@[0-9]@', $_POST['code']);
        $specialChars = preg_match('@[^\w]@', $_POST['code']);
    
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['code']) < 8) {
          return 'Password should be at least 8 characters in length and should include at least 
          one upper case letter, one number, and one special character, please provide a strong 
          password and register with us';
        } else {
          return false;
        }
      }
    }
  }
}
