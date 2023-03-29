<?php

/**
 * 
 * OtpDataBase is a model that contains queries regarding the database related
 * to otp.
 * 
 */
class OtpDataBase {
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
   * It checks if mail address already exits if so then it is deleted and then 
   * inserted into the database. If mail does not exists then it is just
   * inserted.
   * 
   * @return boolean
   */
  public function emailExist($id, $otp, $email) {
    $sql = "select email from otp where email='$email'";

    if ($this->connection->query($sql)) {
      if ($this->deleteRow($email)) {
        return $this->insertOtp($id, $otp, $email);
      }
    } else {
      return $this->insertOtp($id, $otp, $email);
    }
  }

  /**
   * 
   * It inserts the data into the otp table.
   * 
   * @return boolean
   */
  public function insertOtp($id, $otp, $email) {
    $sql = "insert into otp(id, otp, email) 
      values ('$id', '$otp', '$email')";
    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * 
   * It selects the otp column which matches the mail address and returns the
   * otp.
   * 
   * @return mixed
   */
  public function getOtp($email) {
    $sql = "select otp from otp where email='$email'";
    $result = $this->connection->query($sql);

    if ($result->num_rows) {
      while($row = $result->fetch_assoc()) {
        return $row['otp'];
      }
    } else {
      return false;
    }
  }

  /**
   * 
   * It deletes the row checking the mail address.
   * 
   * @return boolean
   */
  public function deleteRow($mail) {
    $sql = "delete from otp where email='$mail'";
    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }
}
