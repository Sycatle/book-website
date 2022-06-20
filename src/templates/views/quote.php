<?php

$pageTitle = $quoteText;
$canGoBack = true;
$pageTypeName = "Citations";
$pageDescription = "Citation de " . $quoteAuthorName;

ob_start(); 
?>

<section id="quote-section">
    <article class="d-flex row">
        <div class="quote-title col-9 mx-auto">
            <h1><?= $quoteText ?></h1><br>
            <p>Auteur: <a href="./?author=<?= $quoteAuthorSlug ?>"><?= $quoteAuthorName ?></a></p>
            <p>Catégorie: <a href="./?gender=<?= $quoteGenderSlug ?>"><?= $quoteGender ?></a></p>
        </div>
    </article>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>