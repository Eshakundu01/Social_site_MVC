<?php

class Database {

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

  public function fetchEmail() {
    $sql = "select email from user";
    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $mailid[] = $row['email'];
      }
      return $mailid;
    } else {
      return false;
    }
  }

  public function fetchPassword() {
    $sql = "select passcode from user";
    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $code[] = $row['passcode'];
      }
      return $code;
    } else {
      return false;
    }
  }
}
