<?php
$pageTitle = "Connexion";
$pageTypeName = "Accéder à votre compte";
$canGoBack = true;

ob_start();
?>

<section class="container">

	<?php if (isset($errorMessage)) { ?>
        <p class="alert alert-danger text-center col-6 mx-auto"><?= $errorMessage ?></p>
	<?php } ?>

	<form class="form-group py-4 mx-auto col-6" method="POST" name="login">
		<label>Identifiant:</label>
		<input type="text" name="identifier" class="form-control" placeholder="Votre adresse-mail, nom d'utilisateur ou téléphone " required>
		<label>Mot de passe:</label>
		<input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe">

		<button type="submit" name="login" class="btn btn-primary mx-auto my-4"><img src="./assets/img/login.png" height="20px"> Accéder</button>
	</form>

	<form class="form-group py-4 mx-auto col-6" method="POST" name="register" enctype="multipart/form-data">

		<label>Nom d'utilisateur*:</label>
		<input type="text" name="username" class="form-control" placeholder="Entrer votre nom d'utilisateur" required>

		<label>Adresse mail*:</label>
		<input type="email" name="email" class="form-control" placeholder="name@exemple.com" required>

		<label>Mot de passe*: </label>
		<input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required>

		<label>Prénom:</label>
		<input type="text" name="name" class="form-control" placeholder="Entrer votre prénom">

		<label>Nom de famille:</label>
		<input type="text" name="surname" class="form-control" placeholder="Entrer votre nom de famille">

		<label>Avatar souhaité: </label>
		<input type="file" name="avatar" class="form-control-file" required>

		<button type="submit" name="register" class="btn btn-warning mx-auto my-4">
			<img src="./assets/img/login.png" height="20px"> S'inscrire</button>
	</form>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>