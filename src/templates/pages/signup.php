<?php
$pageTitle = "Inscription";
$pageTypeName = "Inscription";
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

		<form class="form-group mx-auto my-5 w-75" method="POST" name="register" enctype="multipart/form-data">
			<h1 class="text-center mb-4">Créer votre compte</h1>

			<?php if (isset($errorMessage)) { ?>
			<p class="alert alert-danger text-center mx-auto"><?= $errorMessage ?></p>
			<?php } ?>

			<div class="form-group my-2">
				<label>Nom d'utilisateur *</label>
				<input type="text" name="username" class="form-control" placeholder="Entrer votre nom d'utilisateur" required>
			</div>

			<div class="form-group my-2">
				<label>Adresse mail *</label>
				<input type="email" name="email" class="form-control" placeholder="name@exemple.com" required>
			</div>

			<div class="form-group my-2">
				<label>Mot de passe *</label>
				<input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required>
			</div>

			<div class="form-group my-2">
				<label>Prénom</label>
				<input type="text" name="name" class="form-control" placeholder="Entrer votre prénom">
			</div>

			<div class="form-group my-2">
				<label>Nom de famille</label>
				<input type="text" name="surname" class="form-control" placeholder="Entrer votre nom de famille">
			</div>

			<div class="form-group my-2">
				<label>Avatar souhaité</label>
				<input type="file" name="avatar" class="form-control-file" required>
			</div>

			<div class="form-button d-flex mt-4">
				<a href="./?r=signin" class="text-muted me-auto">J'ai déjà un compte</a>
				<button type="submit" name="register" class="btn btn-primary ms-auto">Accéder</button>
			</div>
		</form>
	</div>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>