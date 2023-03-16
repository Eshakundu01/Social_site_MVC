<?php

use GuzzleHttp\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
require_once 'config/maildetails.php';

class Mail {

  public static function verifyMail($mail) {
    $client = new GuzzleHttp\Client();
    $response = $client->request('GET', 'https://emailvalidation.abstractapi.com/v1/?api_key=9405e1a98c2f48249b4c65d12954b955&email='.$mail);

    $result = $response->getBody();
    $validationResult = json_decode($result, true);
    if ($validationResult["is_valid_format"]['value'] && $validationResult["is_smtp_valid"]['value']) {
      return false;
    } else {
      return true;
    }
  }

  public static function registrationMail($mail) {
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

    $mail->From = "esha.kundu@innoraft.com";

    $mail->addAddress($mail);
    $mail->isHTML(true);

    $mail->Subject = "<b>Register successfully</b>";
    $mail->Body = "Thank you for connecting with us!";

    try {
      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
}