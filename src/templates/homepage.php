<?php
$pageTitle = "Accueil";
$canGoBack = false;

$noHeader = true;
$noSidebar = true;
$noFooter = true;

ob_start(); ?>

<div class="container">
    <img src="./assets/img/light/brand_icon.svg" height="65px">
    <img src="./assets/img/light/brand_text.svg" height="65px">
    <a class="btn btn-primary" title="Rejoindre" href="./?r=signup">
        Rejoindre l'aventure
    </a>
</div>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>