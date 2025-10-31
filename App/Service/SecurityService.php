<?php

namespace App\Service;

use App\Repository\UsersRepository;
use App\Entity\Users;
use App\Utils\Tools;

class SecurityService
{
    private readonly UsersRepository $usersRepository;

    public function __construct()
    {
        $this->usersRepository = new UsersRepository();
    }
    public function register(Users $user)
    {

        // Verification du remplissage des champs
        if (isset($post["submit"])) {
            return;
        }
        // Verification de l'existance du compte
        if ($this->usersRepository->isUserExistWithEmail($user->getEmail())) {
            return "Ce compte existe déjà";
        }
        //Hash du password
        $user->hashPassword();
        try {
            //code//Save en BDD du User
            $this->usersRepository->saveUser($user);
        } catch (\PDOException $ex) {
            return "Erreur d'enregistrement";
        }
        return "Le compte " . $user->getEmail() . " a été ajouté en BDD";
    }

    public function login(Users $user)
    {
        $post = Tools::sanitize_array($_POST);

        //Récupére l'objet User
        $user = $this->usersRepository->findUserByEmail($post["email"]);

        //Si le compte n'existe pas
        if (!isset($user)) {
        }
        if (!$user->verifPassword($user->getPassword())) {
            return "Les informations de connexion email et ou password sont invalides";
        }

        $_SESSION["email"] = $user->getEmail();
        $_SESSION["firstname"] = $user->getFirstname();
        $_SESSION["lastname"] = $user->getLastname();
        return "Vous êtes bien connecté";
    }
    public function logout()
    {
        session_destroy();
        header("Location:/");
    }
}
