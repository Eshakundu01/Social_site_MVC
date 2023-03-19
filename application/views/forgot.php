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
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<div class="bg">
    <div class="container">
      <div class="content">
        <div><img src="/assets/images/icon.png" class="icon" alt="logo"></div>
        <h2 class="heading">Forgot Password</h2>
        <p>Enter your registered email address to change the password</p>
        <form action="" method="POST">
          <div class="input">
            EMAILID: <input type="text" name="mail" id="mail" class="entries" placeholder="Enter email address">
          </div>
          <span id="mail-error" class="error"></span>

          <div>
            <input type="submit" name="reset" class="btn" value="RESET">
            <a href="/home/index" class="btn back">GO BACK</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>