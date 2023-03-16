<?php

class CheckInput {

  public static function checkName() {
    if (isset($_POST['register'])) {

      // Validate full name
      if (empty($_POST['name'])) {
        echo "Name field cannot be empty";
      } elseif (!preg_match("/^[a-zA-Z-' ]+$/", $_POST['name'])) {
        echo "Only alphabets and whitespace are allowed";
      } else {
        return false;
      }
    }
  }

  public static function checkMail() {
    if (isset($_POST['register'])) {

      // Validate email address
      if (empty($_POST['mail'])) {
        echo "Email field cannot be empty";
      } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format is used";
      } else {
        if (Mail::verifyMail($_POST['mail'])) {
          echo "Not a vaild email address";
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
        echo "Date of birth field cannot be empty";
      } else {
        $date = explode('-', $_POST['dob']);

        $year = (int)$date[0];
        $currentyear = (int)date('Y');

        $month = (int)$date[1];
        $currentmonth = (int)date('m');

        $date = (int)$date[2];
        $currentdate = (int)date('d');

        if ($_POST['dob'] == date('Y-m-d') || $year > $currentyear || $month > $currentmonth || $date > $currentdate) {
          echo "Date of birth cannot be present or future date";
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
        echo "Password field cannot be empty";
      } else {
        $uppercase = preg_match('@[A-Z]@', $_POST['code']);
        $lowercase = preg_match('@[a-z]@', $_POST['code']);
        $number = preg_match('@[0-9]@', $_POST['code']);
        $specialChars = preg_match('@[^\w]@', $_POST['code']);
    
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['code']) < 8) {
          echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        } else {
          return false;
        }
      }
    }
  }
}