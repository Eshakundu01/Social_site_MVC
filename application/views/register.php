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
  <script src="/assets/js/formvalidation.js"></script>
</head>
<body>
  <div class="bg">
    <div class="container">
      <div class="content">
        <div><img src="/assets/images/icon.png" class="icon" alt="logo"></div>
        <h2 class="heading">JOIN US!</h2>
        <p>Fill in the details below to connect with us...</p>

        <form action="/register/signup" method="POST">
          <div class="input">
            FULL NAME: <span class="required">*</span>
            <input type="text" name="name" id="name" class="entries" placeholder="Enter your fullname" required 
            <?php 
            if (isset($_POST['name'])) {
              echo "value=\"" . $_POST['name'] . "\""; 
            } ?>>
          </div>
          <span id="name-error" class="error"><?php if (Register::checkName()) 
          { echo Register::checkName(); }?></span>

          <div class="input">
            EMAIL ID: <span class="required">*</span>
            <input type="text" name="mail" id="mail" class="entries" placeholder="Enter your email address" required 
              <?php 
              if (isset($_POST['mail'])) {
                echo "value=\"" . $_POST['mail'] . "\""; 
              } 
            ?>>
          </div>
          <span id="mail-error" class="error"><?php if (Register::checkMail()) 
          { echo Register::checkMail(); }?></span>

          <div class="input">
            DATE OF BIRTH: <span class="required">*</span>
            <input type="date" name="dob" id="dob" class="entries" required
            <?php if (isset($_POST['dob'])) {
              echo "value=\"" . $_POST['dob'] . "\"";
            } 
            ?>>
          </div>
          <span class="error"><?php if (Register::checkBirthDay()) 
          { echo Register::checkBirthDay(); }?></span>

          <div class="input">
            SELECT YOUR GENDER:
            <ul class="gender">
              <li>
                <input type="radio" name="gender" class="select" value="male" 
                <?php if (isset($_POST['gender']) && $_POST['gender']=="male") 
                  echo "checked";?>>
                Male
              </li>
              <li>
                <input type="radio" name="gender" class="select" value="female"
                <?php if (isset($_POST['gender']) && $_POST['gender']=="female") 
                echo "checked";?>>
                Female
              </li>
              <li>
                <input type="radio" name="gender" class="select" value="others"
                <?php if (isset($_POST['gender']) && $_POST['gender']=="others") 
                echo "checked";?>>
                Others
              </li>
            </ul>
          </div>

          <div class="input">
            PASSWORD: <span class="required">*</span>
            <input type="password" class="entries" name="code" id="code" placeholder="Enter password" required>
            <i id="show" class="fa fa-eye"></i>
          </div>
          <span id="password-error" class="error"><?php if (Register::checkPass()) 
          { echo Register::checkPass(); }?></span>

          <div class="button">
            <button type="submit" name="register" id="register" value="done" class="btn">REGISTER</button>
            <a href="/home/index" class="btn back">GO BACK</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
