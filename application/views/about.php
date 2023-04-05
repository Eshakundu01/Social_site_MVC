<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#c1a3d5">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#c1a3d5">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#c1a3d5">
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
  <script src="/assets/js/dark.js"></script>
</head>
<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand font-weight-bold status-menu-item" href="/home/dashboard">
      <img src="/assets/images/icon.png" width="70" height="70" class="rounded-circle d-inline-block align-center" alt="logo">
      Lunamates
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/home/dashboard">
            <i class="fa fa-home"></i>
            Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle list pr-5 mr-4" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-gear"></i>
            Settings
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/home/profile"><i class="fa fa-user pr-2"></i>Profile</a>
            <a class="dropdown-item" id="theme"><i class="fa fa-adjust pr-2"></i>Change Theme</a>
            <a class="dropdown-item" href="/home/about"><i class="fa fa-info pr-2"></i>About</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Body content -->
  <div class="main-container">
    <div class="container about-box">
      <h1 class="heading text-center">About Us</h1>
      <p class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit
        , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Purus non enim praesent elementum. Platea dictumst quisque sagittis
        purus sit amet volutpat consequat. Senectus et netus et malesuada fames
        ac turpis. Arcu bibendum at varius vel pharetra vel turpis. Nunc sed id
        semper risus. Mauris cursus mattis molestie a iaculis. Est velit egestas
        dui id. Consequat id porta nibh venenatis. Vitae nunc sed velit dignissim
        sodales ut. Cras semper auctor neque vitae tempus quam pellentesque nec.
        Malesuada bibendum arcu vitae elementum curabitur. Etiam dignissim diam
        quis enim lobortis scelerisque. Consequat interdum varius sit amet mattis.
        Euismod elementum nisi quis eleifend quam adipiscing vitae. Elit
        ullamcorper dignissim cras tincidunt lobortis. Nibh nisl condimentum id
        venenatis a condimentum vitae sapien pellentesque. Est pellentesque elit
        ullamcorper dignissim cras tincidunt lobortis. Urna porttitor rhoncus dolor
        purus non enim. Dolor sit amet consectetur adipiscing.
        Pharetra et ultrices neque ornare aenean euismod elementum nisi quis.
        Sapien eget mi proin sed libero enim sed faucibus. Sed vulputate odio ut
        enim blandit volutpat. Mi proin sed libero enim sed faucibus turpis.
        Tempus iaculis urna id volutpat lacus laoreet non curabitur. Neque
        convallis a cras semper auctor neque. Ut tortor pretium viverra
        suspendisse potenti nullam. Dignissim convallis aenean et tortor at
        risus viverra adipiscing.
      </p>
    </div>
  </div>

  <footer class="foot">
    <div class="container">
      <div class="text-center p-4 item">
        Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2023. All rights reserved.
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
