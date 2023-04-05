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
  <!-- Favicon -->
  <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <!-- Google fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Moon+Dance&display=swap" rel="stylesheet">
  <!-- Font awesome icon -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="/assets/css/styles.css">
  <!-- Jquery CDN and external script link-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="/assets/js/resetvalidate.js"></script>
  <script src="/assets/js/dark.js"></script>
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
          <a id="mode"><li>Change Theme</li></a>
        </ul>
      </div>
    </nav>
    <!-- Email Form -->
    <div class="container box">
      <div class="content innerbox">
        <div><img src="/assets/images/icon.png" class="icon" alt="logo"></div>
        <h2 class="heading">Forgot Password</h2>
        <p>Enter your registered email address to receive an OTP</p>
        <form>
          <div>
            <span class="input">EMAILID:<span class="required">*</span></span>
            <input type="text" name="mail" id="mail" class="entries place" placeholder="Enter email address" required
            <?php 
              if (isset($_POST['mail'])) {
                echo "value=\"" . $_POST['mail'] . "\""; 
              } 
            ?>>
          </div>
          <span id="mail-error" class="error"></span>

          <div class="button">
            <input type="button" name="submit" id="submit" class="btn" value="SUBMIT">
            <a href="/home/index" class="btn text-dark text-decoration-none">GO BACK</a>
          </div>
        </form>

        <!-- OTP Modal -->
        <div class="modal fade" id="otpbox" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center input">OTP VALIDATION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form action="/reset/action" method="POST">
                  <div id="otp-error" class="error"></div>
                  <input class="otp" type="text" id="pin1" oninput='digitValidate(this)' onkeyup="clickEvent(this,'pin2')" maxlength=1 >
                  <input class="otp" type="text" id="pin2" oninput='digitValidate(this)' onkeyup="clickEvent(this,'pin3')" maxlength=1 >
                  <input class="otp" type="text" id="pin3" oninput='digitValidate(this)' onkeyup="clickEvent(this,'pin4')" maxlength=1 >
                  <input class="otp" type="text" id="pin4" oninput='digitValidate(this)' maxlength=1 >
                  <div class="mt-4 pt-2 border-secondary border-top">
                    <input type="button" name="resend" id="resend" value="RESEND" class="btn" onclick="this.form.reset();">
                    <input type="button" name="verified" id="verified" value="VERIFY" class="btn" data-dismiss="modal">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Reset Password Modal -->
        <div class="modal fade" id="resetbox" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title text-center heading">Reset Your Password</h2> 
              </div>
              <div class="modal-body">
                <p>Enter your new password below...</p>
                <form>
                  <div class="input-box">
                    <span class="input">NEW PASSWORD:</span>
                    <input type="password" name="key" id="key" class="entries" placeholder="Enter your new password" required>
                    <i id="view" class="fa fa-eye"></i>
                  </div>
                  <div id="pass-error" class="error"></div>

                  <div class="input-box">
                    <span class="input">CONFIRM PASSWORD:</span>
                    <input type="password" name="pass" id="pass" class="entries" placeholder="Re-enter your new password" required>
                    <i id="display" class="fa fa-eye"></i>
                  </div>
                  <div id="key-error" class="error"></div>
                  
                  <div class="mt-4 pt-2 border-secondary border-top">
                    <input type="button" name="reset" id="reset" value="RESET" class="btn" data-dismiss="modal">
                    <a href="/home/index" class="btn text-dark text-decoration-none">GO BACK</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="loadbox">
        <img src="/assets/images/loader.gif" id="loading" alt="loader" class="load">
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
