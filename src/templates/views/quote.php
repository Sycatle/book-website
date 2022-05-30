<?php
$quoteData = $quoteManager->getQuoteData($_GET['slug']);
if ($quoteData == null) header("Location: ./?error=404");

$quoteId = $quoteData['quote_id'];
$quoteText = $quoteData['quote_text'];
$quoteSlug = $quoteData['quote_slug'];
$quoteGender = $quoteData['category_name'];
$quoteGenderSlug = $quoteData['category_slug'];
$quoteAuthorName = $quoteData['author_name'];
$quoteAuthorSlug = $quoteData['author_slug'];

$pageTitle = $quoteText;
$canGoBack = true;
$pageTypeName = "Citations";
$pageDescription = "Citation de " . $quoteAuthorName;

ob_start(); 
?>

<section id="quote-section">
    <article class="d-flex row">
        <div class="quote-title col-9 mx-auto">
            <h1><?php echo($quoteText); ?></h1><br>
            <p>Auteur: <a href="./?author=<?php echo($quoteAuthorSlug); ?>"><?php echo($quoteAuthorName); ?></a></p>
            <p>Catégorie: <a href="./?category=<?php echo($quoteGenderSlug); ?>"><?php echo($quoteGender); ?></a></p>
        </div>
    </article>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>