<?php

$pageTitle = $authorName;
$canGoBack = true;
$pageTypeName = "Auteurs";
$pageDescription = $authorDescription;

ob_start();
?>


<section id="author-section" class="container">
    <p>
        <a class="text-decoration-none" href='./?r=authors'>
            <?= $pageTypeName ?>
        </a>
        >
        <a class="text-decoration-none" href=''>
            <?= $authorName ?>
        <a>
    </p>

    <article class="card d-flex">
        <div class="book-title flex-column ">
            <h1><?= $authorName ?></h1>
            <hr>
            <p><?= $authorBiography ?></p>
        </div>
        <div class="book-informations col-lg-3 container flex-column float-end">
            <img src="./uploads/authors/<?= $authorSlug ?>.webp" height="200px">
            <div id="author-data"> 
            <a class="book-gender text-white d-flex bebl-<?= $authorGenderColor ?>-bg" href="?r=gender&&slug=<?= $authorGenderSlug ?>">
                    <span class="text-white d-flex p-1 mx-2"><?= $authorGender ?></span>
                </a>
                <div class="author-birth text-white d-flex" style="text-decoration:none;border-radius:15px;background-color:gray">
                    <span class="text-white d-flex p-1 mx-2"> Né(e) le <?= $authorBirth ?></span>
                </div>
            </div>
        </div>
    </article>

    <article class="author-summary-wrapper py-2">
        <h3>Biographie</h3>
        <p><?= $authorBiography ?></p><br>
    </article>

    <article class="py-2">
        <?php
        $sliderTitle = "Les livres de " . $authorName;
        $sliderRate = false;
        $searchedBooks = $manager->getBookManager()->getBooksByAuthor($authorId);
        include("./src/templates/contents/book_carousel.php");
        ?>
    </article>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>