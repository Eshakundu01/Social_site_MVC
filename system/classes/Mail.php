<?php

use GuzzleHttp\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
require_once 'config/secret.php';

/**
 * 
 * Mail is a class that performs functions related to validating the mail
 * address, sending registration mail, sending OTP through mail.
 * 
 */
class Mail {
  /**
   * 
   * It verifies if the mail address provided actually exists.
   * 
   * @param string $mail the mail address of the user.
   * @static
   * @return boolean
   */
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

  /**
   * 
   * It sends an email to the user after successful registration.
   * 
   * @param string $emailId the mail address of the user.
   * @static
   * @return boolean
   */
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

    $mail->setFrom(MAILID, 'Lunamates');

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

  /**
   * 
   * It sends OTP to the user on request.
   * 
   * @param int $pin the pin which is send through email.
   * @param string $email the mail address of the user.
   * @static
   * @return boolean
   */
  public static function otpSend($pin, $email) {
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
    
    $mail->setFrom(MAILID, 'Lunamates');

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "OTP GENERATED TO RESET PASSWORD";
    $mail->Body = 'Enter the below generated otp in the page to reset your password.<br><b>OTP : <b>' . $pin . '<br>Do not share this code with anyone';

    try {
      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
}
