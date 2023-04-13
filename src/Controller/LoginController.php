<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
  #[Route('/', name: 'app_login')]
  public function index(): Response
  {
    if (isset($_POST['login'])) {
      return $this->redirect('home');
    } else {
      return $this->render('login/login.html.twig');
    }
  }

  #[Route('/forgot', name: 'app_forgot')]
  public function forgot(): Response
  {
    return $this->render('login/forgot.html.twig');
    
  }
}
