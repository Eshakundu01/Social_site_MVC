<?php

require_once 'config/secret.php';

class Password {

  public static function encrypt($pass) {

    $method = 'AES-256-CBC';

    // Using hash
    $key = hash('sha256', CRYPTKEY);
  
    // iv - encrypt method AES-256-CBC expects 16 bytes
    $iv = substr(hash('sha256', CRYPTIV), 0, 16);

    $output = base64_encode(openssl_encrypt($pass, $method, $key, 0, $iv));

    return $output;
  }

  public static function decrypt($pass) {

    $method = 'AES-256-CBC';

    // Using hash
    $key = hash('sha256', CRYPTKEY);
  
    // iv - encrypt method AES-256-CBC expects 16 bytes
    $iv = substr(hash('sha256', CRYPTIV), 0, 16);

    $output = openssl_decrypt(base64_decode($pass), $method, $key, 0, $iv);

    return $output;
  }
}
