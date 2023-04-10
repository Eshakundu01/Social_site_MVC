<?php 

require_once 'application/controllers/Post.php';

$view = new Post();

// $rows = $view->updatedPost();
$tuples = $view->allPost();

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
  <meta name="msapplication-navbutton-color" content="#c1a3d5">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#c1a3d5">
  <title>Lunamates</title>
  <!-- Favicon -->
  <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <!-- Font Awesome link -->
  <script src="https://kit.fontawesome.com/3414b53c72.js" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="/assets/css/home.css">
  <!-- Jquery CDN and Jquery Cookie CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  <!-- Sharing the whole website link -->
  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6432ac8e7e455e00129f0f3a&product=sticky-share-buttons&source=platform" async="async"></script>
  <script src="/assets/js/home.js"></script>
  <script src="/assets/js/dark.js"></script>
  <script src="/assets/js/cookies.js"></script>
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
            Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle list" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-gear"></i>
            Settings
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/home/profile"><i class="fa fa-user pr-2"></i>Profile</a>
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
      <div class="row">
        <!-- Welcome message -->
        <div class="col-lg-3 col-md-6 col-sm py-3 greetbox text-center">
          <div>
            <img src="/assets/images/hello.gif" alt="hello" class="greet">
          </div>
          <div class="font-weight-bold status-menu-item">
            <?php 
            if (isset($_SESSION['user']['name'])) {
              echo " " . $_SESSION['user']['name'];
            } elseif (isset($_SESSION['newname'])) {
              echo " " . $_SESSION['newname'];
            }?>
          </div>
          <p class="content">Our website welcomes you, find your friends here. For any help send a mail to the given mail address
            <a href="mailto:Lunamates<esha.kundu@innoraft.com>">esha.kundu@innoraft.com</a>
          </p>
        </div>

        <!-- Create a new post and post the same-->
        <div class="col-lg-9 col-md-6 col-sm">
          <div>
            <div class="status box">
              <div class="status-menu">
                <h2 class="album-title">Post Here</h2>
              </div>
              <form action="/post/share" method="POST" enctype="multipart/form-data">
                <div class="status-main">
                  <img src="<?php 
                  if (isset($_SESSION['pic'])) {
                    echo '/assets/uploads/' . $_SESSION['pic'];
                  } elseif (isset($_SESSION['user']['photo'])) {
                    echo '/assets/uploads/' . $_SESSION['user']['photo'];
                  } 
                  ?>" class="status-img">
                  <textarea name="postarea" class="status-textarea" placeholder="Write what is on your mind..."></textarea>
                </div>
                <div class="status-actions">
                  <span>
                    <label for="upload">
                      <img src="/assets/images/camera.png" id="image" alt="upload photo" class="status-action"/>
                      <i id="check" class="fa fa-check text-success tick"></i>
                    </label>
                    <input type="file" id="upload" name="upload" class="uploadbtn" accept=".png, .jpg, .jpeg"/>
                  </span>
                  <span>
                    <label for="video" title="Upload video less than 1MB">
                      <img src="/assets/images/video.png" id="videofile" alt="add-video" class="status-action"/>
                      <i id="select" class="fa fa-check text-success tick"></i>
                    </label>
                    <input type="file" id="video" name="video" class="uploadbtn" accept=".mp4, .avi, .mov, .mpeg">
                  </span>
                  <input type="submit" name="submit" class="status-share" value="Share" />
                </div>
              </form>
            </div>

            <?php
            if ($tuples) {
              for ($i=0; $i<count($tuples); $i++) {
            ?>
            <!-- View the post -->
            <div class="album box my-3">
              <div class="status-main">
                <img src="<?php echo '/assets/uploads/' . $tuples[$i]['userimage']; ?>" 
                alt="profile-photo" class="status-img" />
                <div class="album-detail">
                  <div class="album-title">
                    <strong>
                      <?php 
                      echo $tuples[$i]['username'];
                      ?>
                    </strong>
                  </div>
                  <div class="album-date"><?php echo $tuples[$i]['date'];?></div>
                </div>
              </div>
              <div class="album-content">
                <p class="m-0 p-1 album-date"><?php echo $tuples[$i]['content'];?></p>
                <div class="album-photos">
                  <?php
                  if ($tuples[$i]['image']) {
                  ?>
                  <img src="<?php echo '/assets/uploads/' . $tuples[$i]['image'];?>"
                  class="album-photo" />
                  <?php
                  }
                  ?>
                </div>
                <div class="album-photos">
                  <?php if ($tuples[$i]['video']) {
                  ?>
                    <video class="clip" controls>
                      <source src="<?php echo '/assets/video/' . $tuples[$i]['video'];?>" />
                    </video>
                  <?php
                    }
                  ?>
                </div>
              </div>
              <div class="album-actions">
                <a id="share" target="_blank"
                href="https://www.twitter.com/share?url=<?php //echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>&text=<?php echo $tuples[$i]['content']; ?>" class="album-action">
                  <i class="fa fa-share"></i>
                </a>
              </div>
            </div>
            <?php
                }
              }
            ?>
            <button id="load" class="status-share">Load More</button>
            <div class="sharethis-sticky-share-buttons"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cookies box -->
  <?php if (!isset($_COOKIE['cookies_consent'])) { ?>
    <div class="cookie-wrapper">
      <div class="title-box">
        <i class="fa fa-cookie-bite"></i>
        <h3>Cookies Consent</h3>
      </div>
      <div class="buttons">
        <div class="info">
          <p>
            This website use cookies to help you have a superior and more relevant
            browsing experience on the website. <a href="/home/cookie"> Read more...</a>
          </p>
        </div>
        <div class="info">
          <button class="switch" id="accept">Accept</button>
        </div>
        <div class="info">
          <button class="switch" id="decline">Decline</button>
        </div>
      </div>
    </div>
  <?php } ?>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
