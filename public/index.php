<?php

//Import de l'autoloader
include __DIR__ . "/../vendor/autoload.php";

//Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();
//Démarrage de la session
session_start();

use App\Controller\SecurityController;
use App\Controller\BookController;


/** Bloc Router */

use Mithridatem\Routing\Route;
use Mithridatem\Routing\Router;
use Mithridatem\Routing\Exception\RouterException;

//instance du router
$router = new Router();

/** Ajouter les routes */

$router->map(Route::controller('GET', '/login', SecurityController::class, 'connexion'));
$router->map(Route::controller('POST', '/login', SecurityController::class, 'connexion'));
$router->map(Route::controller('GET', '/logout', SecurityController::class, 'deconnexion'));
$router->map(Route::controller('GET', '/register', SecurityController::class, 'registerController'));
$router->map(Route::controller('POST', '/register', SecurityController::class, 'registerController'));
$router->map(Route::controller('GET', '/book', BookController::class, 'addBookToUser'));
$router->map(Route::controller('POST', '/book', BookController::class, 'addBookToUser'));

try {
    $router->dispatch();
} catch (RouterException $e) {
    if ( $e->getCode() == 404) {
        echo "pb";
    }
    if ($e->getCode() == 403) {
        echo "pb";
    }
}