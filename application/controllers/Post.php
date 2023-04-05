<?php

/**
 * Post is  acontroller that performs functions related to post like insertion
 * of post data into the database and getting all post data from database.
 */
class Post extends FrameWork {
  /**
   * Checks session already started or not and according starts the session
   * after that if post is shared then the data of the post is inserted into
   * the database. After successfull insertion the data is fetched from the
   * database.
   *
   * @return mixed
   */
  public function share() {
    if(session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }

    // $this->view('home');

    if (isset($_POST['submit'])) {
      $id = date("d-m-y-H-i-s-") . rand(100,1000);

      if (isset($_FILES['upload']['name'])) {
        $image = $_FILES['upload']['name'];
        $path = 'assets/uploads/' . basename($image);
        move_uploaded_file($_FILES['upload']['tmp_name'], $path);
      } else {
        $image = "";
      }

      if (isset($_FILES['video']['name'])) {
        $video = $_FILES['video']['name'];
        $videoPath = 'assets/video/' . basename($video);
        move_uploaded_file($_FILES['video']['tmp_name'], $videoPath);
      } else {
        $video = "";
      }

      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        $result = $connect->getAllData($_SESSION['user']['mail']);
        $date = date('jS F Y');
        if ($result) {
          if ($this->model('PostDatabase')) {
            $post = new PostDatabase();
            if ($post->insertPost($id, $result['name'], $_POST['postarea'], $date, $image, $video, $result['userpic'])) {
              $this->redirect('home/dashboard');
            } else {
              return false;
            }
          }
        }
      }
    }
  }

  public function allPost() {
    if ($this->model('PostDatabase')) {
      $result = new PostDatabase();
      return $result->getPost();
    }
  }

  public function updatedPost() {
    if ($this->share()) {
      if ($this->model('PostDatabase')) {
        $result = new PostDatabase();
        return $result->getPost();
      }
    }
  }
}
