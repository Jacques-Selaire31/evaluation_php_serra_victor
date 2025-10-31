<?php

namespace App\Controller;

use App\Service\SecurityService;
use App\Entity\Users;
use App\Controller\AbstractController;

class SecurityController extends AbstractController
{
    private readonly SecurityService $securityService;
    public function __construct()
    {
        $this->securityService = new SecurityService();
    }
    //Méthode register (créer un compte User)
    public function registerController()
    {
        if (isset($_POST["submit"])) {
            $user = (new Users())->setFirstname($_POST["firstname"])->setLastname($_POST["lastname"])->setEmail($_POST["email"])->setPassword($_POST['password']);
            $data["message"] = $this->securityService->register($user);
        }

        //rendu de la vue

        $this->render('register', 'register', $data ?? []);
    }
    //Méthode login (se connecter)
    public function connexion()
    {
        if ($this->isFormSubmitted($_POST)) {
            $user = (new Users())->setEmail($_POST["email"])->setPassword($_POST["password"]);
            $data["message"] = $this->securityService->login($user);
        }
        $this->render('login', 'connexion', $data ?? []);
    }
    public function deconnexion()
    {
        $this->securityService->logout();
    }
}
