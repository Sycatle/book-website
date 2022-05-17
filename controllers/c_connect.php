<?php
session_start();

require("./models/Manager.php");

$manager = new \sycatle\beblio\models\Manager();
$userManager = $manager->getUserManager();

if (isset($_POST['login'])) {
	if (isset($_POST['identifier']) && isset($_POST['password'])){
		$identifier = stripslashes($_POST['identifier']);
		$password = stripslashes($_POST['password']);

		if($userManager->login($identifier, $password) != null) {
			$user = new \sycatle\beblio\models\objects\User($userManager->login($identifier, $password));
			$user->setupSession();
		} else {
			die("Identifiants incorrects: " . $identifier . $password);
		}
	} else {
		die("Vous devez remplir tous les champs du formulaire pour pouvoir vous connecter.");
	}
} else if (isset($_POST['register'])) {
	if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
		$name = htmlspecialchars(stripslashes($_POST['name']));
		$surname = htmlspecialchars(stripslashes($_POST['surname']));
		$username = htmlspecialchars(stripslashes($_POST['username']));
		$email = htmlspecialchars(stripslashes($_POST['email']));
		$password = htmlspecialchars(stripslashes($_POST['password']));
	
		if (!$userManager->isUsernameTaken($username)) {
			if (!$userManager->isMailTaken($email)) {
				if ($userManager->register($name, $surname, $username, $email, $password) != null) {
					$user = new \sycatle\beblio\models\objects\User($userManager->login($username, $password));
					$user->setupSession();
				} else {
					die("Impossible de créer votre compte, veuillez ré-essayez plus tard.");
				}
			} else {
				die("L'adresse-mail '" . $email . "' n'est pas disponible.");
			}
		} else {
			die("Le nom d'utilisateur '" . $username . "' n'est pas disponible.");
		}
	}
}

// Si l'utilisateur n'est pas connecté, afficher le formulaire de connection. Sinon, retourner au routeur index.php.
if(!isset($_SESSION["user"])) {
	require("./views/pages/connect.php");
} else {
	//echo("Aucune session détectée.");
	header("Location: .".(isset($_GET["a"]) ? "/?r=".$_GET["a"] : ""));
}