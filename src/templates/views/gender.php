<?php

$pageTitle = $genderName;
$canGoBack = true;
$pageTypeName = "Genres";

ob_start();
?>


<div id="banner" class="top-separator">
    <?php
    $searchedQuotes = $manager->getQuoteManager()->getQuotesByGender($genderId);
    include("templates/contents/quote_carousel.php");
    ?>
</div>
<section class="container">
    <div id="">
        <?php
        $sliderTitle = "De " . $genderName;
        $sliderRate = 0;
        $searchedBooks = $manager->getBookManager()->getBooksByGender($genderId);
        include("templates/contents/book_carousel.php");
        ?>
    </div>
    <div class="mt-5">
        <?php
        $sliderTitle = "De " . $genderName;
        $sliderRate = 0;
        $searchedAuthors = $manager->getAuthorManager()->getAuthorsByGender($genderId);
        include("templates/contents/author_carousel.php");
        ?>
    </div>
</section>

<?php
$content = ob_get_clean();
require("templates/template.php");
?>