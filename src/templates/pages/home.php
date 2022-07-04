<?php
$pageTitle = "Accueil";
$canGoBack = false;

ob_start(); ?>

<div id="banner" class="top-separator" style="background-image: url('./assets/img/home_banner.webp');">
    <?php /*
    $searchedQuotes = $manager->getQuoteManager()->getQuotes();
    include("./src/templates/contents/quote_carousel.php");
    */ ?>
</div>

<section class="container">
    <div>
        <?php
        $sliderTitle = "En tendances";
        $sliderRate = 16000;
        $searchedBooks = $manager->getBookManager()->getBooksSortedByViews(10);
        include("./src/templates/contents/book_carousel.php");
        ?>
    </div>

    <div class="my-5">
        <?php
        $sliderTitle = "En tendances";
        $sliderRate = 5000;
        $searchedAuthors = $manager->getAuthorManager()->getAuthorsSortedByViews(10);
        include("./src/templates/contents/author_carousel.php");
        ?>
    </div>

    <div class="my-5">
        <?php
        $sliderTitle = "Genres";
        $sliderRate = 5000;
        $searchedGenders = $manager->getGenderManager()->getGenders(9);
        include("./src/templates/contents/gender_carousel.php");
        ?>
    </div>
</section>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>