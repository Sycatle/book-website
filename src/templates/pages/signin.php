<?php
$pageTitle = "Connexion";
$pageTypeName = "Accéder à votre compte";
$canGoBack = true;

$noHeader = true;
$noSidebar = true;
$noFooter = true;

ob_start();
?>

<section class="container">
	<div class="col-lg-6 card rounded-3 mx-auto">
		<div id="brand" class="d-flex mx-auto mt-5">
			<img src="./assets/img/dark/brand_icon.svg" height="65px">
			<img src="./assets/img/dark/brand_text.svg" height="65px">
		</div>

		<form class="form-group mx-auto my-5 w-75" method="POST" name="login">
			<h1 class="text-center mb-4">Accéder à votre compte</h1>

			<?php if (isset($errorMessage)) { ?>
			<p class="alert alert-danger text-center mx-auto"><?= $errorMessage ?></p>
			<?php } ?>

			<div class="form-group my-2">
				<label class="mb-1" for="login-identifier">Identifiant</label>
				<input id="login-identifier" type="text" name="identifier" class="form-control" placeholder="Votre adresse-mail, nom d'utilisateur ou téléphone " required>
			</div>
			
			<div class="form-group my-2">
				<label class="mb-1" for="login-password">Mot de passe</label>
				<input id="login-password" type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe">
			</div>
			
			<div class="form-button d-flex mt-4">
				<a href="./?r=signup" class="text-muted me-auto">Je n'ai pas de compte</a>
				<button type="submit" name="login" class="btn btn-primary ms-auto">Accéder</button>
			</div>
		</form>
	</div>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>