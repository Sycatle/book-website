<?php 
$pageTitle = "Accueil";

ob_start();
?>
<section id="dashboard-section">
<!--     <div id="banner" style="background-image: url('./public/img/banner_5.png')">
		<span>Je suis un élément de la bannière</span>
		<span>Je suis le deuxième élément de la bannière</span>
	</div> -->
</section>

<?php 
$content = ob_get_clean();
require("./views/layouts/layout.php");
?>