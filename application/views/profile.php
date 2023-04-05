<?php
require_once 'application/controllers/Profile.php';
$profile_obj = new Profile();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#c1a3d5">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#ffffff">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">
  <title>Lunamates</title>
  <!-- Favicon -->
  <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <!-- Font Awesome link -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="/assets/css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="/assets/js/profile.js"></script>
  <script src="/assets/js/dark.js"></script>
</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand font-weight-bold status-menu-item" href="/home/dashboard">
      <img src="/assets/images/icon.png" width="70" height="70" class="rounded-circle d-inline-block align-center" alt="logo">
      Lunamates
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/home/dashboard">
            <i class="fa fa-home"></i>
            Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle list" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-gear"></i>
            Settings
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/home/profile">Profile</a>
            <a class="dropdown-item" id="theme"><i class="fa fa-adjust pr-2"></i>Change Theme</a>
            <a class="dropdown-item" href="/home/about"><i class="fa fa-info pr-2"></i>About</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link list" href="/home/logout">
            <i class="fa fa-sign-out"></i>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Body content -->
  <div class="main-container">
    <div class="container">
      <div class="bg-light mb-2 p-3 text-primary" id="success">
        <?php 
        if ($profile_obj->update()) 
          {echo "Successfully updated";}
        ?>
      </div>
      <div class="profile">
        <!-- Profile Picture -->
        <div class="profile-avatar">
          <form action="/profile/update" method="POST" enctype="multipart/form-data">
            <div class="form-group avatar-preview">
              <img src="<?php
              if ($profile_obj->update() and $profile_obj->getPhoto()) {
                echo '/assets/uploads/' . $profile_obj->getPhoto();
              } elseif (isset($_SESSION['users']['photo'])) {
                echo '/assets/uploads/' . $_SESSION['users']['photo'];
              } else {
                echo '/assets/uploads/' . $_SESSION['user']['photo'];
              }
              ?>" alt="upload profile photo" class="profile-img"/>
              <label for="imageUpload">
                <span class="edit p-2"><i class="fa fa-pencil"></i></span>
              </label>
              <input type='file' id="imageUpload" name="imageUpload" class="uploadbtn" accept=".png, .jpg, .jpeg" />
            </div>
            <div class="text-center uploadbtn" id="uploadpic">
              <input type="submit" name="upload" class="btn btn-primary" value="UPDATE">
            </div>
          </form>
        </div>
        <form action="/profile/update" method="POST" enctype="multipart/form-data">
          <!-- Cover Picture -->
          <div class="form-group">
            <img src="<?php
            if ($profile_obj->update() and $profile_obj->getCover()) {
              echo '/assets/uploads/' . $profile_obj->getCover();
            } elseif ($_SESSION['users']['coverPhoto']) {
              echo "/assets/uploads/" . $_SESSION['users']['coverPhoto'];
            } else {
              echo '/assets/uploads/' . $_SESSION['user']['coverPhoto'];
            }
            ?>" alt="upload cover photo" class="profile-cover"/>
            <label for="cover">
              <span id="add" class="addcover p-2"><i class="fa fa-plus"></i></span>
            </label>
            <input type="file" id="cover" name="cover" class="uploadbtn" accept=".png, .jpg, .jpeg" />
            <div class="coverupdate uploadbtn" id="change">
              <input type="submit" name="change" class="btn btn-primary" value="UPDATE">
            </div>
          </div>
        </form>
      </div>
      <!-- Personal details -->
      <div class="mt-2 p-4 detailsbox">
        <div class="header">
          <span class="heading">PERSONAL DETAILS</span>
          <button id="edit" class="btn btn-primary mb-2 ml-2">EDIT</button>
        </div>
        <form action="/profile/update" method="POST">
          <div class="form-group mt-2">
            <label for="name" class="profile-name pr-2">FULL NAME</label>
            <input type="text" name="name" id="name" class="input-field fields" required 
            <?php 
            if (isset($_POST['name'])) {
              echo "value=\"" . $_POST['name'] . "\""; 
            } elseif (isset($_SESSION['users']['name'])) {
              echo "value=\"" . $_SESSION['users']['name'] . "\"";
            } else {
              echo "value=\"" . $_SESSION['user']['name'] . "\"";
            }
            ?>>
          </div>
          <div class="form-group mt-2">
            <label for="email" class="profile-name pr-2">EMAIL-ID</label>
            <input type="text" name="email" id="email" class="input-field"
            <?php 
              echo "value=\"" . $_SESSION['user']['mail'] . "\"";   
            ?> disabled>
          </div>
          <div class="form-group mt-2">
            <label for="birthday" class="profile-name pr-2">DATE OF BIRTH</label>
            <input type="date" name="birthday" id="birthday" class="input-field fields" required 
            <?php 
            if (isset($_POST['birthday'])) {
              echo "value=\"" . $_POST['birthday'] . "\""; 
            } elseif (isset($_SESSION['users']['birthday'])) {
              echo "value=\"" . $_SESSION['users']['birthday'] . "\"";
            } else {
              echo "value=\"" . $_SESSION['user']['birthday'] . "\"";
            }  
            ?>>
          </div>
          <div class="form-group mt-2">
            <span class="profile-name pr-2">GENDER</span>
            <ul class="gender">
              <li class="pr-3">
                <input type="radio" name="gender" class="select fields" value="male" 
                <?php
                if (isset($_POST['gender']) && $_POST['gender']=="male") {
                  echo "checked";
                } elseif ($_SESSION['users']['gender'] == "male") {
                  echo "checked";
                } elseif ($_SESSION['user']['gender'] == "male") {
                  echo "checked";
                } ?>>
                Male
              </li>
              <li class="pr-3">
                <input type="radio" name="gender" class="select fields" value="female"
                <?php 
                if (isset($_POST['gender']) && $_POST['gender']=="female") {
                  echo "checked";
                } elseif ($_SESSION['users']['gender'] == "female") {
                  echo "checked";
                } elseif ($_SESSION['user']['gender'] == "female") {
                  echo "checked";
                }
                ?>>
                Female
              </li>
              <li class="pr-3">
                <input type="radio" name="gender" class="select fields" value="others"
                <?php
                if (isset($_POST['gender']) && $_POST['gender']=="others") {
                  echo "checked";
                } elseif ($_SESSION['users']['gender'] == "others") {
                  echo "checked";
                } elseif ($_SESSION['user']['gender'] == "others") {
                  echo "checked";
                }
                ?>>
                Others
              </li>
            </ul>
          </div>
          <div class="form-group mt-2">
            <label for="place" class="profile-name pr-2">LIVES IN</label>
            <input type="text" name="place" id="place" class="input-field fields"
            <?php 
            if (isset($_POST['place'])) {
              echo "value=\"" . $_POST['place'] . "\""; 
            } elseif ($_SESSION['users']['home']) {
              echo "value=\"" . $_SESSION['users']['home'] . "\"";
            } else {
              echo "value=\"" . $_SESSION['user']['home'] . "\"";
            } 
            ?>>
          </div>
          <div class="form-group mt-2">
            <label for="about" class="profile-name pr-2">ABOUT YOU</label>
            <textarea name="about" id="about" class="input-field fields">
            <?php 
            if (isset($_POST['about'])) {
              echo $_POST['about']; 
            } elseif ($_SESSION['users']['about']) {
              echo $_SESSION['users']['about'];
            } else {
              echo $_SESSION['user']['about'];
            }
            ?>
            </textarea>
          </div>
          <div class="form-group mt-2">
            <input type="submit" name="submit" class="btn btn-info" value="SAVE">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <!-- <footer class="foot">
    <p class="content text-center p-3">For any help send a mail to the given mail address
      <a href="mailto:Lunamates<esha.kundu@innoraft.com>">esha.kundu@innoraft.com</a>
    </p>
  </footer> -->

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
