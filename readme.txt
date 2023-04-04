Social media site

Secret.php file used in Class Mail file consists of mailaddress used for smtp
connection for sending Mail using Phpmailer library.
To send the mail using Phpmailer a password is needed which is generated using
2-step verification and the same generated password is used in the 
$mail->Password.

In secret.php file the key for encryption and decrpytion is defined that consists
of a string it can be any string. This file also consists of initialized vector
which initializes the process of encryption of plaintext. The initialized vector
is also a random string. These two variables key and initialized vector are used
in the Password class file.
