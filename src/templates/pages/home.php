<?php
$pageTitle = "Accueil";
$canGoBack = false;

ob_start(); ?>

<div id="banner" class="shapedividers_com-6318 ">
    <?php
    $searchedQuotes = $manager->getQuoteManager()->getQuotes();
    include("./src/templates/contents/quote_carousel.php");
    ?>
</div>

<section id="feed-section" class="container-fluid">
    <div class="sliding-section">
        <p class="title">Les livres en tendances</p>
        <?php 
        $searchedBooks = $manager->getBookManager()->getBooks(9);
        include("./src/templates/contents/book_carousel.php"); 
        ?>
    </div>

    <div class="sliding-section mt-5">
        <p class="title">Trouver par genre</p>
        <?php
        $searchedGenders = $manager->getGenderManager()->getGenders(9);
        include("./src/templates/contents/gender_carousel.php");
        ?>
    </div>
</section>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>