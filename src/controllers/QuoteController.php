<?php
session_start();

require("./src/Manager.php");
$manager = new \sycatle\beblio\Manager();
$quoteManager = $manager->getQuoteManager();

if (isset($_GET['slug'])) {
    $quoteData = $quoteManager->getQuoteData($_GET['slug']);
    if ($quoteData == null) header("Location: ./?error=404");

    $quoteId = $quoteData['quote_id'];
    $quoteText = $quoteData['quote_text'];
    $quoteSlug = $quoteData['quote_slug'];
    $quoteGender = $quoteData['category_name'];
    $quoteGenderSlug = $quoteData['category_slug'];
    $quoteAuthorName = $quoteData['author_name'];
    $quoteAuthorSlug = $quoteData['author_slug'];
    require("./src/templates/views/quote.php");
} else {
    header("Location: .");
}
