<?php if (!isset($_SESSION)) session_start();

require("Manager.php");
$manager = new \sycatle\beblio\Manager();

$userManager = $manager->getUserManager();
$formManager = $manager->getFormManager();

use \sycatle\beblio\entities\User;

if (isset($_POST['login'])) {
	if (isset($_POST['identifier']) && isset($_POST['password'])) {
		$identifier = $formManager->safeFormat($_POST['identifier']);
		$password = $formManager->safeFormat($_POST['password']);

		if ($userManager->loginUser($identifier, $password)) {
			$errorMessage = "Connecté avec succès.";
		} else {
			$errorMessage = "Identifiants incorrects, avez-vous oublié votre mot de passe?";
		}
	} else {
		$errorMessage = "Merci de remplir tous les champs du formulaire.";
	}
}

$user = isset($_SESSION['id']) ? new User($_SESSION['id']) : null;

// Si l'utilisateur n'est pas connecté, afficher le formulaire de connection. Sinon, retourner au routeur index.php.
if ($user == null) {
	require("templates/pages/login.php");
} else {
	//echo("Aucune session détectée.");
	header("Location: ." . (isset($_GET["a"]) ? "/?r=" . $_GET["a"] : ""));
}
?>