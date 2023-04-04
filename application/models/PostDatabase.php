<?php

/**
 * 
 * PostDatabase is a model that contains queries regarding the database related
 * to user's posts.
 * 
 */
class PostDatabase {
  /**
   * 
   * Stores the connection of the database.
   * 
   * @var mixed
   * @access protected
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
   * Inserting post data into post table.
   *
   * @param int $id
   * @param string $name
   * @param string $content
   * @param string $date
   * @param string $image
   * @param string $video
   * @return boolean
   */
  public function insertPost($id, $name, $content, $date, $image, $video, $userpic) {
    $sql = "insert into post(postid, username, content, date, image, video, userimage) 
    values ('$id', '$name', '$content', '$date', '$image', '$video', '$userpic')";

    if ($this->connection->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Fetches all the posts from the post table.
   *
   * @return mixed
   */
  public function getPost() {
    $sql = "select * from post order by postid desc";

    $result = $this->connection->query($sql);

    if ($result->num_rows) {
      while($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
      return $rows;
    } else {
      return false;
    }
  }
}
