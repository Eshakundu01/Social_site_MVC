<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lunamates</title>
  <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Moon+Dance&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/assets/css/styles.css">
  <script src="/assets/js/loginvalidate.js"></script>
</head>
<body>
  <div class="bg">
    <div class="container">
      <div class="content">
        <div><img src="/assets/images/icon.png" class="icon" alt="logo"></div>
        <h2 class="heading">WELCOME</h2>
        <p>Enter your emailid and password to connect with others...</p>
        <form action="/home/login" method="POST">
          <div class="input">
            EMAILID: <input type="text" name="email" id="email" class="entries" placeholder="Enter email address" required>
          </div>
          <span id="email-error" class="error"></span>

          <div class="input">
            PASSWORD: <input type="password" id="pass" name="pass" class="entries" placeholder="Enter password" required>
            <i id="show" class="fa fa-eye"></i>
          </div>
          <span id="pass-error" class="error"></span>
          <div class="connect forgot"><a href="/home/forgot" class="link">Forgot Password?</a></div>

          <div><input type="submit" name="login" id="login" class="btn login" value="LOGIN"></div>
          <div class="connect">Don't have a account yet?
            <a href="/register/signup" class="link">Register Now</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
