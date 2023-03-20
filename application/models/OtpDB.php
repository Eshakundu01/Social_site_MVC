<?php

class OtpDB {

  protected $connection;

  public function __construct() {
    $this->connection = new mysqli(SERVER, USER, PASS, DBNAME);
    // Check connection
    if ($this->connection->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  }

  public function insertOtp($id, $email, $otp, $time) {
    $sql = "insert into otp(id, email, otp, time) 
      values ('$id', '$email', '$otp', '$time')";
    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function updateOtp($id, $email, $otp, $time) {
    $sql = "insert into otp(id, email, otp, time) 
      values ('$id', '$email', '$otp', '$time')";
    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }
}