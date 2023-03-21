<?php

class OtpDataBase {

  protected $connection;

  public function __construct() {
    $this->connection = new mysqli(SERVER, USER, PASS, DBNAME);
    // Check connection
    if ($this->connection->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  }

  public function emailExist($id, $otp, $email) {
    $sql = "select * from otp";
    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $mailid[] = $row['email'];
      }
    } else {
      return $this->insertOtp($id, $otp, $email);
    }

    if (in_array($email, $mailid)) {
      if ($this->deleteRow($email)) {
        return $this->insertOtp($id, $otp, $email);
      }
    } else {
      return $this->insertOtp($id, $otp, $email);
    }
  }

  public function insertOtp($id, $otp, $email) {
    $sql = "insert into otp(id, otp, email) 
      values ('$id', '$otp', '$email')";
    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function getOtp($email) {
    $sql = "select * from otp where email='$email'";
    $result = $this->connection->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        return $row['otp'];
      }
    } else {
      return false;
    }
  }

  public function deleteRow($mail) {
    $sql = "delete from otp where email='$mail'";
    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }
}
