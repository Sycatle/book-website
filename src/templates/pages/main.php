<?php
$pageTitle = "Accueil";
$canGoBack = false;

ob_start(); ?>

<div class="container">
    <h1>Bienvenue sur Bebl.io </h1>
    <img src="./assets/img/light/brand_icon.svg" height="65px">
    <img src="./assets/img/light/brand_text.svg" height="65px">
    <button class="btn btn-primary" title="Poster" data-bs-toggle="modal" data-bs-target="#connectModal">
        Devenir Membre
    </button>
</div>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>