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
        <div><img src="<?php echo BASEURL; ?>/assets/images/icon.png" class="icon" alt="logo"></div>
        <h2 class="heading">JOIN US!</h2>
        <p>Fill in the details below to connect with us...</p>
        <form action="" method="POST">
          <div class="input">FULL NAME: <input type="text" name="name" id="name" class="entries" placeholder="Enter your fullname" required></div>
          <span id="name-error" class="error"></span>

          <div class="input">EMAIL ID: <input type="text" name="mail" id="mail" class="entries" placeholder="Enter your email address" required></div>
          <span id="mail-error" class="error"></span>

          <div class="input">
            DATE OF BIRTH: <input type="date" name="dob" class="entries" required>
          </div>

          <div class="input">
            SELECT YOUR GENDER:
            <ul class="gender">
              <li><input type="radio" name="gender" class="select" value="MALE">Male</li>
              <li><input type="radio" name="gender" class="select" value="FEMALE">Female</li>
              <li><input type="radio" name="gender" class="select" value="OTHERS">Others</li>
            </ul>
          </div>

          <div class="input">
            PASSWORD: <input type="password" class="entries" name="code" id="code" placeholder="Enter password" required>
            <i id="show" class="fa fa-eye"></i>
          </div>
          <span id="password-error" class="error"></span>

          <div>
            <input type="submit" name="register" class="btn" value="REGISTER">
            <a href="<?php echo BASEURL; ?>" class="btn back">GO BACK</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>