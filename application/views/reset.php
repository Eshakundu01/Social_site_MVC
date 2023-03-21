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
  <script src="/assets/js/resetvalidate.js"></script>
</head>
<body>
  <div class="bg">
    <div class="container">
      <div class="content">
        <div><img src="/assets/images/icon.png" class="icon" alt="logo"></div>
        <h2 class="heading">Reset Your Password</h2>
        <p>Enter your new password below...</p>
        <form action="" method="POST">
          <div class="input">
            NEW PASSWORD: <input type="password" name="key" id="key" class="entries" placeholder="Enter your new password">
            <i id="show" class="fa fa-eye"></i>
          </div>
          <span id="key-error" class="error"></span>

          <div class="input">
            CONFIRM PASSWORD: <input type="password" name="pass" id="pass" class="entries key" placeholder="Re-enter your new password">
            <i id="show" class="fa fa-eye"></i>
          </div>
          <span id="key-error" class="error"></span>

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
