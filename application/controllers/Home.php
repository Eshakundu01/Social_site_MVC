<?php

require_once 'vendor/autoload.php';
require_once 'config/secret.php';
/**
 * 
 * Home is a controller which extends properties from FrameWork class.
 * 
 */
class Home extends FrameWork {
  /**
   * 
   * It checks if login page is present in the views
   * folder and if it is present then the page is embedded.
   * 
   * @return void
   */
  public function index() {
    $this->view('login');

    if (isset($_POST['login'])) {
      session_start();
      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        $result = $connect->getAllData($_POST['email']);
        if ($result) {
          $_SESSION['user'] = [
            'name' => $result['name'],
            'mail' => $_POST['email'],
            'photo' => $result['userpic'],
            'birthday' => $result['dob'],
            'gender' => $result['gender'],
            'coverPhoto' => $result['coverpic'],
            'home' => $result['place'],
            'about' => $result['about']
          ];
          $this->redirect('home/dashboard');
        }
      }
    }
  }

  /**
   * 
   * It views the forgot password page.
   * 
   * @return void
   */
  public function forgot() {
    $this->view('forgot');
  }

  /**
   * 
   * It views a page if the user has already registered.
   * 
   * @return void
   */
  public function registered() {
    $this->error('registered');
  }

  /**
   * 
   * It views the error page if page not found.
   * 
   * @return void
   */
  public function page() {
    $this->error('error');
  }

  /**
   * 
   * It views the dashboard or the wall page if anonymous users enters, the 
   * login page is viewed.
   * 
   * @return void
   */
  public function dashboard() {
    session_start();
    if (isset($_SESSION['user']['name']) || isset($_SESSION['newname'])) {
      $this->view('home');
      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        $result = $connect->getAllData($_SESSION['user']['mail']);
        if ($result) {
          $_SESSION['users'] = [
            'name' => $result['name'],
            'birthday' => $result['dob'],
            'gender' => $result['gender'],
            'photo' => $result['userpic'],
            'coverPhoto' => $result['coverpic'],
            'home' => $result['place'],
            'about' => $result['about']
          ];
        }
      }
    } else {
      $this->redirect('home/index');
    }
  }

  /**
   * 
   * This is the logout part which destroys the session and unsets the values,
   * then redirects to the login page.
   * 
   * @return void
   */
  public function logout() {
    session_start();
    session_unset();
    session_destroy();
    $this->redirect('home/index'); 
  }

  /**
   * 
   * It views the profile page of the user that consists of user information 
   * which can be edited.
   * 
   * @return void
   */
  public function profile() {
    session_start();
    if (isset($_SESSION['user']['name'])) {
      $this->view('profile');
    } else {
      $this->redirect('home/index');
    }
  }

  /**
   * 
   * It views the about page which provides a details about the website.
   * 
   * @return void
   */
  public function about() {
    $this->view('about');
  }

  public function login() {
    $client = new Google_Client();
    $client->setClientId(CLIENTID);
    $client->setClientSecret(CLIENTSECRET);
    $client->setRedirectUri(REDIRECTURL);
    $client->addScope("email");
    $client->addScope("profile");

    if (isset($_GET['code'])) {
      session_start();
      echo $_GET["code"];
      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
      $client->setAccessToken($token);

      $auth = new Google_Service_Oauth2($client);
      $info = $auth->userinfo->get();

      $mail = $info->email;
      $name = $info->name;

      if ($this->model('UserDatabase')) {
        $connect = new UserDatabase();
        if ($connect->emailExist($mail)) {
          $result = $connect->getAllData($mail);
          if ($result) {
            $_SESSION['user'] = [
              'name' => $result['name'],
              'mail' => $mail,
              'photo' => $result['userpic'],
              'birthday' => $result['dob'],
              'gender' => $result['gender'],
              'coverPhoto' => $result['coverpic'],
              'home' => $result['place'],
              'about' => $result['about']
            ];
            $this->redirect('home/dashboard');
          }
        } else {
          $password = Password::encrypt(rand(10000000,99999999));

          $result = $connect->insertUserInfo($name, $mail, "", "", $password);
          if ($result) {
            $data = $connect->getAllData($mail);
            if ($data) {
              $_SESSION['user'] = [
                'name' => $name,
                'mail' => $mail,
                'photo' => $data['userpic'],
                'birthday' => $data['dob'],
                'gender' => $data['gender'],
                'coverPhoto' => $data['coverpic'],
                'home' => $data['place'],
                'about' => $data['about']
              ];
              $this->redirect('home/dashboard');
            }
          }
        }
      }

    } else {
      return $client->createAuthUrl();
    }
  }
}
