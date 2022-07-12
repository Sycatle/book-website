<?php
$pageTitle = "Accueil";
$pageDescription = "Trouvez les livres, les citations et les auteurs qui vous correspondent.";
$canGoBack = false;

ob_start(); ?>

<div id="banner" style="background-image: url('./assets/img/home_banner.webp');">
    <?php /*
    $searchedQuotes = $manager->getQuoteManager()->getQuotes();
    include("./src/templates/contents/quote_carousel.php");
    */ ?>
</div>

<section class="container col-lg-9 mx-auto">
    <div class="my-5">
        <?php
        $sliderTitle = "Les plus populaires";
        $sliderRate = 0;
        $searchedBooks = $manager->getBookManager()->getBooksSortedByViews(10);
        include("./src/templates/contents/book_carousel.php");
        ?>
    </div>

    <div class="my-5">
        <?php
        $sliderTitle = "Les plus consultés";
        $sliderRate = 0;
        $searchedAuthors = $manager->getAuthorManager()->getAuthorsSortedByViews(10);
        include("./src/templates/contents/author_carousel.php");
        ?>
    </div>

    <div class="my-5">
        <?php
        $sliderTitle = "Genres";
        $sliderRate = 0;
        $searchedGenders = $manager->getGenderManager()->getGenders(9);
        include("./src/templates/contents/gender_carousel.php");
        ?>
    </div>

</section>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>