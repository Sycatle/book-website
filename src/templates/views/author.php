<?php

$pageTitle = $author->getName();
$canGoBack = true;
$pageTypeName = "Auteurs";
$pageDescription = $author->getDescription();

ob_start();
?>


<section id="author-section" class="container">
    <p>
        <a class="text-decoration-none" href='./?r=authors'>
            <?= $pageTypeName ?>
        </a>
        >
        <a class="text-decoration-none" href=''>
            <?= $author->getName() ?>
        <a>
    </p>

    <article class="card d-flex">
        <div class="book-title flex-column ">
            <h1><?= $author->getName() ?></h1>
            <hr>
            <p><?= $author->getBiography() ?></p>
        </div>
        <div class="book-informations col-lg-3 container flex-column float-end">
            <img src="<?= $author->getImageLink() ?>" alt="Aucune image pour <?= $author->getName() ?>" height="200px">
            <div id="author-data"> 
            <a class="book-gender text-white d-flex bebl-<?= $author->getGender()->getColor() ?>-bg" href="<?= $author->getGender()->getUrl() ?>" title="<?= $author->getGender()->getName() ?>">
                    <span class="text-white d-flex p-1 mx-2"><?= $author->getGender()->getName() ?></span>
                </a>
                <div class="author-birth text-white d-flex" style="text-decoration:none;border-radius:15px;background-color:gray">
                    <span class="text-white d-flex p-1 mx-2"> Né(e) le <?= $author->getBirth() ?></span>
                </div>
            </div>
        </div>
    </article>

    <article class="author-summary-wrapper py-2">
        <h3>Biographie</h3>
        <p><?= $author->getBiography() ?></p>
    </article>

    <article class="py-2">
        <?php
        $sliderTitle = "Les livres de " . $author->getName();
        $sliderRate = false;
        $searchedBooks = $author->getBooks();
        include("./src/templates/contents/book_carousel.php");
        ?>
    </article>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>