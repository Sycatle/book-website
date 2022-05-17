<?php
$quoteData = $quoteManager->getQuoteData($_GET['quote']);
if ($quoteData == null) header("Location: ./?error=404");

$quoteId = $quoteData['quote_id'];
$quoteText = $quoteData['quote_text'];
$quoteSlug = $quoteData['quote_slug'];
$quoteCategory = $quoteData['category_name'];
$quoteCategorySlug = $quoteData['category_slug'];
$quoteAuthorName = $quoteData['author_name'];
$quoteAuthorSlug = $quoteData['author_slug'];

$pageTitle = $quoteText;

ob_start(); 
?>


<section id="quote-section">
    <article class="d-flex row">
        <div class="quote-title col-9 mx-auto">
            <h1><?php echo($quoteText); ?></h1><br>
            <p>Auteur: <a href="./?author=<?php echo($quoteAuthorSlug); ?>"><?php echo($quoteAuthorName); ?></a></p>
            <p>Catégorie: <a href="./?category=<?php echo($quoteCategorySlug); ?>"><?php echo($quoteCategory); ?></a></p>
            <p><?php echo($quoteDescription); ?></p>
        </div>
    </article>
</section>

<?php 
$content = ob_get_clean();
require("./views/layouts/layout.php");
?>