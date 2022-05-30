<?php 
$pageTitle = "Réglages";
$canGoBack = true;

ob_start();
?>
<section id="settings-section">
    Affichage de vos paramètres;
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>