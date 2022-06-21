<?php

$pageTitle = $genderName;
$canGoBack = true;
$pageTypeName = "Genres";

ob_start();
?>


<section id="gender-section">
    <article class="card d-flex">
        <div class="gender-title mx-auto">
            <h1><?= $genderName ?></h1>
            <p><?= $genderDescription ?></p>
        </div>
    </article>
    <article class="my-2 py-5">
        <h3 class="title"><?= $genderName ?></h3>
        <?php
        $searchedBooks = $manager->getBookManager()->getBooksByGender($genderId);
        include("./src/templates/contents/book_carousel.php");
        ?>
    </article>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>