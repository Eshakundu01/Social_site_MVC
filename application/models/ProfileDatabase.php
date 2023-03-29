<?php

/**
 * 
 * ProfileDatabase is a model that contains queries regarding the database
 * related to profile.
 * 
 */
class ProfileDatabase {
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

  public function insertData($id, $email, $profilepic, $coverpic, $describe, $place) {
    $sql = "insert into user(id, email, profilepic, coverpic, description, place) 
    values ('$id', '$email', '$profilepic', '$coverpic', '$describe', '$place')";

    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }


}
