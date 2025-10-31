<?php

namespace App\Repository;

use App\Database\MySQL;
use App\Entity\Users;

class UsersRepository
{
    private \PDO $connexion;
    //Constructeur
    public function __construct()
    {
        $this->connexion = (new MySQL())->connectBDD();
    }

    public function saveUser(Users $user): void
    {
        //1 écrire la requête SQL
        $request = "INSERT INTO users(firstname, lastname, email, `password`)
        VALUE (?,?,?,?)";
        //2 préparation de la requête
        $req = $this->connexion->prepare($request);
        //3 assigner les paramètres
        $req->bindValue(1, $user->getFirstname(), \PDO::PARAM_STR);
        $req->bindValue(2, $user->getLastname(), \PDO::PARAM_STR);
        $req->bindValue(3, $user->getEmail(), \PDO::PARAM_STR);
        $req->bindValue(4, $user->getPassword(), \PDO::PARAM_STR);

        //4 exécuter la requête
        $req->execute();
    }

    public function isUserExistWithEmail(string $email): bool
    {
        $request = "SELECT id_users FROM users  WHERE email = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $email, \PDO::PARAM_STR);
        $req->execute();

        //Test si le compte n'existe pas
        if ($req->fetch(\PDO::FETCH_ASSOC)) {
            return true;
        } else return false;
    }
        public function findUserByEmail(string $email) : ?Users
    {
        $request = "SELECT firstname, lastname, email, 'password' FROM users WHERE email = ?";
        $req = $this->connexion->prepare($request);
        $req->bindParam(1, $email, \PDO::PARAM_STR);
        $req->execute();
        $userData = $req->fetch(\PDO::FETCH_ASSOC);
        
        //Test si l'utilisateur n'existe pas
        if (!$userData) {
            return null;
        }
        //hydrater le tableau
        $user = Users::hydrateUser($userData);
        return $user;
    }
}

