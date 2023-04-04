<?php

class Profile extends FrameWork{

  public function update() {
    if(session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }
    
    $this->view('profile');

    if (isset($_POST['upload'])) {
      if (isset($_FILES['imageUpload']['name'])) {
        $fileProfile = $_FILES['imageUpload']['name'];
        $filePath = 'assets/uploads/' . basename($fileProfile);
        move_uploaded_file($_FILES['imageUpload']['tmp_name'], $filePath);
        if ($this->model('UserDatabase')) {
          $connect = new UserDatabase();
          if ($connect->updateData($_SESSION['user']['mail'], "userpic='$fileProfile'")) {
            $_SESSION['pic'] = $fileProfile;
            return true;
          } else {
            return false;
          }
        }
      }
    }

    if (isset($_POST['change'])) {
      if (isset($_FILES['cover']['name'])) {
        $fileName = $_FILES['cover']['name'];
        $filePath = 'assets/uploads/' . basename($fileName);
        move_uploaded_file($_FILES['cover']['tmp_name'], $filePath);
        if ($this->model('UserDatabase')) {
          $connect = new UserDatabase();
          if ($connect->updateData($_SESSION['user']['mail'], "coverpic='$fileName'")) {
            return true;
          } else {
            return false;
          }
        }
      }
    }

    if (isset($_POST['submit'])) {
      if (isset($_POST['name'])) {
        $name = $_POST['name'];
        if ($this->model('UserDatabase')) {
          $connect = new UserDatabase();
          if ($connect->updateData($_SESSION['user']['mail'], "name='$name'")) {
            $_SESSION['newname'] = $_POST['name'];
          }
        } 
      }
      
      if (isset($_POST['birthday'])) {
        $birth = $_POST['birthday'];
        if ($this->model('UserDatabase')) {
          $connect = new UserDatabase();
          if ($connect->updateData($_SESSION['user']['mail'], "dob='$birth'")) {
            // echo "success";
          } 
        } 
      }
      
      if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
        if ($this->model('UserDatabase')) {
          $connect = new UserDatabase();
          if ($connect->updateData($_SESSION['user']['mail'], "gender='$gender'")) {
            // echo "success";
          }
        } 
      }
      
      if (isset($_POST['place'])) {
        $home = $_POST['place'];
        if ($this->model('UserDatabase')) {
          $connect = new UserDatabase();
          if ($connect->updateData($_SESSION['user']['mail'], "place='$home'")) {
            // echo success;
          }
        } 
      }
      
      if (isset($_POST['about'])) {
        $description = $_POST['about'];
        if ($this->model('UserDatabase')) {
          $connect = new UserDatabase();
          if ($connect->updateData($_SESSION['user']['mail'], "about='$description'")) {
            // echo "success";
          }
        } 
      }
      return true;
    }
  }

  public function getPhoto() {
    if ($this->model('UserDatabase')) {
      $connect = new UserDatabase();
      $result = $connect->getAllData($_SESSION['user']['mail']);
      if ($result) {
        return $result['userpic'];
      } else {
        return false;
      }
    }
  }

  public function getCover() {
    if ($this->model('UserDatabase')) {
      $connect = new UserDatabase();
      $result = $connect->getAllData($_SESSION['user']['mail']);
      if ($result) {
        return $result['coverpic'];
      } else {
        return false;
      }
    }
  }
}
