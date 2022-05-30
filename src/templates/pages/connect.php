<?php 
$pageTitle = "Connexion";
$pageTypeName = "Accéder à votre compte";

ob_start();
?>

<form class="form-group py-4 mx-auto" method="POST" name="login">
	<label>Identifiant:</label>
	<input type="text" name="identifier" class="form-control" placeholder="Votre adresse-mail, nom d'utilisateur ou téléphone " required>
	<label>Mot de passe:</label>
	<input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe">
	
	<button type="submit" name="login" class="btn btn-primary mx-auto my-4"><img src="./assets/img/login.png" height="20px"> Accéder</button>
</form>
			
				<!-- 
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
				</form> -->
				
<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>