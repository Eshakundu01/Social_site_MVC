<?php

class UserDatabase {

  protected $connection;

  public function __construct() {
    $this->connection = new mysqli(SERVER, USER, PASS, DBNAME);
    // Check connection
    if ($this->connection->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  }

  public function insertUserInfo($name, $email, $dob, $gender, $pass) {
    $sql = "insert into user(name, email, dob, gender, passcode) 
      values ('$name', '$email', '$dob', '$gender', '$pass')";
    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function emailExist($email) {
    $sql = "select email from user";
    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $mailid[] = $row['email'];
      }
    }

    if (in_array($email, $mailid)) {
      return true;
    } else {
      return false;
    }
  }

  public function passwordExist($key) {
    $sql = "select passcode from user";
    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $code[] = $row['passcode'];
      }
    }

    if (in_array($key, $code)) {
      return true;
    } else {
      return false;
    }
  }

  public function updatePassword($key, $mail) {
    $sql = "update user set passcode='$key' where email in 
    (select email from otp where email='$mail')";

    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function getName($mail) {
    $sql = "select * from user where email='$mail'";

    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        return $row['name'];
      }
    } else {
      return false;
    }
  }

  public function getAllData($mail) {
    $sql = "select * from user where email='$mail'";

    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        return $row;
      }
    } else {
      return false;
    }
  }
}
