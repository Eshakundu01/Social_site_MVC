<?php

use GuzzleHttp\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
require_once 'config/secret.php';

class Mail {

  public static function verifyMail($mail) {
    $client = new GuzzleHttp\Client();
    $response = $client->request('GET', 'https://api.apilayer.com/email_verification/check?email='.$mail, [
      'headers' => [
        'Content-Type' => 'text/plain',
        'apikey' => '7Wq4gTpRNqcZ1oFVpRDHtJOwN4dBKf0W'
      ]]);

    $result = $response->getBody();
    $validationResult = json_decode($result, true);
    if ($validationResult["format_valid"] && $validationResult["smtp_check"]) {
      return false;
    } else {
      return true;
    }
  }

  public static function registrationMail($emailId) {
    $mail = new PHPMailer(true);  
    // Set up PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = MAILID;
    // Password to use for SMTP authentication 
    $mail->Password = PASSWORD;
    $mail->SMTPSecure = "tls";  
    $mail->Port = 587;  

    $mail->setFrom("esha.kundu@innoraft.com", 'Lunamates');

    $mail->addAddress($emailId);
    $mail->isHTML(true);
    $mail->AddEmbeddedImage('assets/images/welcome.jpg', 'welcome');

    $mail->Subject = "Register successfully";
    $mail->Body = file_get_contents('application/views/confirmationmail.html');

    try {
      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  public function otpSend($pin):bool {
    require 'credentials.php';
    $mail = new PHPMailer(true);  
    // Set up PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $mailadd;
    // Password to use for SMTP authentication 
    $mail->Password = $pass;
    $mail->SMTPSecure = "tls";  
    $mail->Port = 587;  

    $mail->From = "esha.kundu@innoraft.com";

    $mail->addAddress($this->mail);

    $mail->isHTML(true);

    $mail->Subject = "OTP GENERATED TO RESET PASSWORD";
    $mail->Body = 'Enter the below generated otp in the page to reset your password.<br><b>OTP : <b>' . $pin . 'Do not share this code with anyone';

    try {
      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
}