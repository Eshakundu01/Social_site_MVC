<?php session_start(); ?>
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
            <a class="dropdown-item text-danger" href="/home/delete">Delete Account</a>
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
      <div class="profile">
        <div class="profile-avatar">
          <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
          </div>
          <div class="avatar-preview">
            <div id="imagePreview" class="profile-img"></div>
          </div>
          <div class="profile-name">
            <?php if (isset($_SESSION['user'])) {echo " " . $_SESSION['user'];}?>
          </div>
        </div>
        <img src="" alt="coverpic" class="profile-cover">
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="foot">
    <p class="content text-center p-3">For any help send a mail to the given mail address
      <a href="mailto:Lunamates<esha.kundu@innoraft.com>">esha.kundu@innoraft.com</a>
    </p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
