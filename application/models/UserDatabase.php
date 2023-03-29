<?php

/**
 * 
 * UserDatabase is a model that contains queries regarding the database related
 * to user.
 * 
 */
class UserDatabase {
  /**
   * 
   * @var string
   * Stores the connection of the database.
   * 
   */
  protected $connection;

  /**
   * 
   * It is a constructor that initiates new database connection.
   * 
   * @return void
   */
  public function __construct() {
    $this->connection = new mysqli(SERVER, USER, PASS, DBNAME);
    // Check connection
    if ($this->connection->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  }

  /**
   * 
   * It inserts values in the user table.
   * 
   * @return boolean
   */
  public function insertUserInfo($name, $email, $dob, $gender, $pass) {
    $sql = "insert into user(name, email, dob, gender, passcode) 
      values ('$name', '$email', '$dob', '$gender', '$pass')";
    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * 
   * It checks if mail address already exits based on that a boolean value is
   * returned.
   * 
   * @return boolean
   */
  public function emailExist($email) {
    $sql = "select email from user where email='$email'";
    $result = $this->connection->query($sql);

    if ($result->num_rows) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * 
   * It checks if password already exits based on that a boolean value is
   * returned.
   * 
   * @return boolean
   */
  public function passwordExist($key) {
    $sql = "select passcode from user where passcode='$key'";
    $result = $this->connection->query($sql);

    if ($result->num_rows) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * 
   * It updates the password in the user table based on the email address on
   * which otp is generated.
   * 
   * @return boolean
   */
  public function updatePassword($key, $mail) {
    $sql = "update user set passcode='$key' where email in 
    (select email from otp where email='$mail')";

    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * 
   * It fetches all the data related to a particular mail address.
   * 
   * @return mixed
   */
  public function getAllData($mail) {
    $sql = "select * from user where email='$mail'";

    $result = $this->connection->query($sql);

    if ($result->num_rows) {
      while($row = $result->fetch_assoc()) {
        return $row;
      }
    } else {
      return false;
    }
  }
}
