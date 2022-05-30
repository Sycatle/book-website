<?php

/*
    ----------------------------------------------------------------------

    Object : Admin Panel Controller
             Checking to access admin panel

    Author: Sycatle
    Creation Date: 1st April 2022
    Last Update: 22nd May 2022
    Changelogs:
        - 
    To-do:
        - 

    ----------------------------------------------------------------------
*/
namespace sycatle\beblio\controllers;

// Importing Elements
require('./src/Controller.php');
use sycatle\beblio\entity\User;
use sycatle\beblio\Manager;
use sycatle\beblio\Controller;

// Controller
class ConnectController extends Controller{
    public function __construct(){
        session_start();

        $this->initTemplate("./src/templates/pages/connect.php");
        $this->showTemplatePage();
    }
}

$userManager = Manager::getUserManager();

// Get Request 
if (isset($_POST["login"])) {
    if (isset($_POST['identifier']) && isset($_POST['password'])){
        $identifier = trim(htmlspecialchars(stripslashes($_POST['identifier'])));
 		$password = trim(htmlspecialchars(stripslashes($_POST['password'])));

        if ($userManager->login($identifier, $password) != null) {
            $user = new User($userManager->login($identifier, $password));
            $_SESSION["user"] = $user;
            header("Location: .");
        } else {
            echo "Incorrect identifiers.";
        }
    } else {
        echo("Identifiant et mot de passe manquants.");
    }
}

// Si l'utilisateur n'est pas connecté, afficher le formulaire de connection. Sinon, retourner au routeur index.php.
if(isset($_SESSION["user"])) {
    echo $_SESSION["user"]->getId();
}

// if (isset($_POST['login'])) {
// 	if (isset($_POST['identifier']) && isset($_POST['password'])){
// 		$identifier = stripslashes($_POST['identifier']);
// 		$password = stripslashes($_POST['password']);

// 		if($userManager->login($identifier, $password) != null) {
// 			$user = new User($userManager->login($identifier, $password));
// 			$user->setupSession();
// 		} else {
// 			die("Identifiants incorrects: " . $identifier . $password);
// 		}
// 	} else {
// 		die("Vous devez remplir tous les champs du formulaire pour pouvoir vous connecter.");
// 	}
// } else if (isset($_POST['register'])) {
// 	if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
// 		$name = htmlspecialchars(stripslashes($_POST['name']));
// 		$surname = htmlspecialchars(stripslashes($_POST['surname']));
// 		$username = htmlspecialchars(stripslashes($_POST['username']));
// 		$email = htmlspecialchars(stripslashes($_POST['email']));
// 		$password = htmlspecialchars(stripslashes($_POST['password']));
	
// 		if (!$userManager->isUsernameTaken($username)) {
// 			if (!$userManager->isMailTaken($email)) {
// 				if ($userManager->register($name, $surname, $username, $email, $password) != null) {
// 					$user = new User($userManager->login($username, $password));
// 					$user->setupSession();
// 				} else {
// 					die("Impossible de créer votre compte, veuillez ré-essayez plus tard.");
// 				}
// 			} else {
// 				die("L'adresse-mail '" . $email . "' n'est pas disponible.");
// 			}
// 		} else {
// 			die("Le nom d'utilisateur '" . $username . "' n'est pas disponible.");
// 		}
// 	}
// }


