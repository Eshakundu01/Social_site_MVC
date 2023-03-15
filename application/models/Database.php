<?php

class Database {

  protected $connection;

  public function __construct() {
    $this->connection = new mysqli(SERVER, USER, PASS, DBNAME);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  }

  public function insertUserInfo($name, $email, $dob, $gender, $pass) {
    $sql = "insert into user() values ('$user', '$emailid', '$pass')";
  }
}
