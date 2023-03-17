<?php

class CheckInput {

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

  public static function checkMail() {
    if (isset($_POST['register'])) {

      // Validate email address
      if (empty($_POST['mail'])) {
        return "Email field cannot be empty, please fill in and try again";
      } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format is used please correct it, then register with us!";
      } else {
        if (Mail::verifyMail($_POST['mail'])) {
          return "Not a vaild email address provided. Provide a valid email and register with us!";
        } else {
          return false;
        }
      }
    }
  }

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