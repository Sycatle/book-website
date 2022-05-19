<?php 
$pageTitle = "Connexion";

ob_start();
?>

<section class="row mx-auto my-5">
	<div class="form-group border rounded col-lg-6 col-sm-8 mx-auto">
		<img class="mt-2 mb-3" src="./assets/img/dark/brand.svg" height="50px">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="pill" href="#login">J'ai déjà un compte</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="pill" href="#register">Je n'ai pas de compte</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane container active" id="login">
				<form class="form-group py-4 mx-auto" method="POST" name="login">
					<label>Identifiant:</label>
					<input type="text" name="identifier" class="form-control" placeholder="Votre adresse-mail, nom d'utilisateur ou téléphone " required>
					<label>Mot de passe:</label>
					<input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe">
					
					<button type="submit" name="login" class="btn btn-primary mx-auto my-4"><img src="./assets/img/login.png" height="20px"> Accéder</button>
				</form>
			</div>
			<div class="tab-pane container" id="register">
				<form class="form-group py-4 mx-auto" method="POST" name="register">
					<label>Nom d'utilisateur:</label>
					<input type="text" name="username" class="form-control" placeholder="Entrer votre nom d'utilisateur" required>
					<label>Prénom:</label>
					<input type="text" name="name" class="form-control" placeholder="Entrer votre prénom"
						required>
					<label>Nom de famille:</label>
					<input type="text" name="surname" class="form-control"
						placeholder="Entrer votre nom de famille" required>
					<label>Adresse mail:</label>
					<input type="email" name="email" class="form-control" placeholder="name@exemple.com">
					<label>Mot de passe: </label>
					<input type="password" name="password" class="form-control"
						placeholder="Entrer votre mot de passe">
					<button type="submit" name="register" class="btn btn-warning mx-auto my-4"> 
						<img src="./assets/img/login.png" height="20px"> S'inscrire</button>
				</form>
			</div>
		</div>
	</div>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>