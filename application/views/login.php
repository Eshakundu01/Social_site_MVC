<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lunamates</title>
  <link rel="icon" href="<?php echo BASEURL; ?>/assets/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Moon+Dance&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="<?php echo BASEURL; ?>/assets/js/script.js"></script>
</head>
<body>
  <div class="bg">
    <div class="container">
      <div class="content">
        <div><img src="<?php echo BASEURL; ?>/assets/images/icon.png" class="icon"></div>
        <h2 class="heading">WELCOME</h2>
        <p>Enter your username and password to connect with others...</p>
        <form action="" method="POST">
          <div class="input">USERNAME: <input type="text" name="user" class="entries" placeholder="Enter username"></div>
          <span class="error"></span>

          <div class="input">
            PASSWORD: <input type="password" id="code" name="code" class="entries" placeholder="Enter password">
            <i id="show" class="fa fa-eye"></i>
          </div>
          <span class="error"></span>
          <div class="connect forgot"><a href="#" class="link">Forgot Password?</a></div>

          <div><input type="submit" name="login" class="btn" value="LOGIN"></div>
          <div class="connect">Don't have a account yet?
            <a href="<?php echo BASEURL; ?>/home/viewRegister" class="link">Register Now</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>