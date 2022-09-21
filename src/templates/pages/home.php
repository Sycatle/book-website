<?php
$pageTitle = "Accueil";
$pageDescription = "Trouvez les livres, les citations et les auteurs qui vous correspondent.";
$canGoBack = false;

ob_start(); ?>

<section class="md:max-w-6xl mx-auto my-16 sm:my-20">
    <div class="my-5">
        <?php
        $sliderTitle = "Les plus populaires";
        $sliderRate = 0;
        $searchedBooks = $manager->getBookManager()->getBooksSortedByViews(10);
        include("templates/contents/book_carousel.php");
        ?>
    </div>

    <div class="my-5">
        <?php
        $sliderTitle = "Les plus consultés";
        $sliderRate = 0;
        $searchedAuthors = $manager->getAuthorManager()->getAuthorsSortedByViews(10);
        include("templates/contents/author_carousel.php");
        ?>
    </div>

    <!-- <div class="my-5">
        <?php /*
        $sliderTitle = "Genres";
        $sliderRate = 0;
        $searchedGenders = $manager->getGenderManager()->getGenders(9);
        include("templates/contents/gender_carousel.php");
        */ ?>
    </div> -->

</section>

<?php $content = ob_get_clean();
require("templates/template.php");
?>