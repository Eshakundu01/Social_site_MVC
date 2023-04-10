<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lunamates</title>
  <!-- Chrome, Firefox OS and Opera -->
  <meta name="theme-color" content="#4e3464">
  <!-- Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#4e3464">
  <!-- iOS Safari -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#4e3464">
  <!-- Favicon icon -->
  <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Moon+Dance&display=swap" rel="stylesheet">
  <!-- Jquery CDN  and Jquery Cookie CDN-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  <!-- Custom style sheet -->
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="stylesheet" href="/assests/css/cookies.css">
  <!-- Font Awesome Link -->
  <script src="https://kit.fontawesome.com/3414b53c72.js" crossorigin="anonymous"></script>
  <!-- Custom jquery -->
  <script src="/assets/js/loginvalidate.js"></script>
  <script src="/assets/js/dark.js"></script>
  <script src="/assets/js/cookies.js"></script>
</head>
<body>
  <div class="bg">
    <!-- Navbar -->
    <nav role="navigation">
      <div id="menuToggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
          <a href="/home/about"><li>About</li></a>
          <a href="/register/signup"><li>Register</li></a>
          <div id="mode"><li>Change Theme</li></div>
        </ul>
      </div>
    </nav>
    <!-- Login Form -->
    <div class="container">
      <div class="content">
        <h2 class="heading">LOGIN</h2>
        <p>Enter your emailid and password to connect with others...</p>
        <form action="/home/index" method="POST">
          <div class="input">
            EMAILID: <span class="required">*</span>
            <input type="text" name="email" id="email" class="entries" placeholder="Enter email address" required>
          </div>
          <span id="email-error" class="error"></span>

          <div class="input">
            PASSWORD: <span class="required">*</span>
            <input type="password" id="pass" name="pass" class="entries" placeholder="Enter password" required>
            <i id="show" class="fa fa-eye"></i>
          </div>
          <span id="pass-error" class="error"></span>
          <div class="connect forgot"><a href="/home/forgot" class="link">Forgot Password?</a></div>

          <div><input type="submit" name="login" id="login" class="btn login" value="LOGIN"></div>
          <div class="connect">Don't have a account yet?
            <a href="/register/signup" class="link">Register Now</a>
          </div>
        </form>

        <!-- Google login -->
        <div class="google-btn" id="g-btn">
          <a id="sign-in" class="sign">
            <div class="google-icon-wrapper">
              <img class="google-icon" src="/assets/images/google-logo.png"/>
            </div>
            <p id="btn-text"><b>Sign in with google</b></p>
          </a>
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
  <?php
  }
  ?>
</body>
</html>
