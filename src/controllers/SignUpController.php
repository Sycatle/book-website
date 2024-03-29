<?php if (!isset($_SESSION)) session_start();

require("Manager.php");
$manager = new \sycatle\beblio\Manager();

$userManager = $manager->getUserManager();
$formManager = $manager->getFormManager();

use \sycatle\beblio\entities\User;

if (isset($_POST['register'])) {
	if (isset($_POST["name"]) &&
		isset($_POST["surname"]) &&
		isset($_POST["username"]) &&
		isset($_POST["email"]) &&
		isset($_POST["password"])) {
		if (isset($_FILES["avatar"])) {
			$name = $formManager->safeFormat($_POST['name']);
			$surname = $formManager->safeFormat($_POST['surname']);
			$username = $formManager->safeFormat($_POST['username']);
			$email = $formManager->safeFormat($_POST['email']);
			$password = $formManager->safeFormat($_POST['password']);
			$avatar = $_FILES['avatar'];

			if ($userManager->isUsernameAvailable($username)) {
				if ($userManager->isMailAvailable($email)) {
					if ($userManager->registerUser($name, $surname, $username, $email, $password, $avatar)) {
						$userManager->loginUser($username, $password);
					} else {
						$errorMessage = "Erreur lors de la tentative de création du compte.";
					}
				} else {
					$errorMessage = "L'adresse mail que vous avez saisit ne semble pas disponible.";
				}
			} else {
				$errorMessage = "L'adresse mail que vous avez saisit ne semble pas disponible.";
			}
		} else {
			$errorMessage = "Il manque une image.";
		}
	} else {
		$errorMessage = "Il manque des éléments.";
	}
}

$user = isset($_SESSION['id']) ? new User($_SESSION['id']) : null;

// Si l'utilisateur n'est pas connecté, afficher le formulaire de connection. Sinon, retourner au routeur index.php.
if ($user == null) {
	require("templates/pages/signup.php");
} else {
	header("Location: .");
}
?>