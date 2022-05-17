<?php 
$pageTitle = "Ma bibliothèque";

ob_start();
?>
<section id="library-section">
<!--     <div id="banner" style="background-image: url('./public/img/banner_3.png')">
		<span>Je suis un élément de la bannière</span>
		<span>Je suis le deuxième élément de la bannière</span>
	</div> -->
</section>

<?php 
$content = ob_get_clean();
require("./views/layouts/layout.php");
?>