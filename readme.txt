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

For the google sign-in the following steps are taken to generate CLIENTID,
CLIENTSECRET and REDIRECTURL:
In the google cloud console we have to create an account if one doesn't have a
account then create new project. After that the project is selected to view the
dashboard page.
In the dashboard page under the API & SERVICES, credentials is selected. In this
page create credentials is selected and the details about the website in which
google api will be integrated is filled out.
Lastly, again the create credential is selected and the application type is
choosen from the list provided. On completion a id and secret key is generated.
To use the above information the google/apiclient package is installed using
composer and used as per the requirement.
In this project the CLIENTID, CLIENTSECRET and REDIRECTURL are present in the
secret.php file.
