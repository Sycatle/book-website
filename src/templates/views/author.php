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
        <div class="book-informations container flex-column float-end">
            <img src="./uploads/authors/<?= $authorSlug ?>.webp" height="200px">
            <div id="author-data"> 
            <a class="book-gender text-white d-flex" href="?r=gender&&slug=<?= $authorGenderSlug ?>" style="text-decoration:none;border-radius:15px;background-color:<?= $authorGenderColor ?>;">
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
        <h3 class="title">Les livres de <?= $authorName ?></h3>
        <?php $booksByGender = $manager->getBookManager()->getBooksByAuthor($authorId);
        while ($row = $booksByGender->fetch(PDO::FETCH_ASSOC)) { ?>
            <a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="col-2"><img class="shadow-lg" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px" width="140px"></a>
        <?php } ?>
    </article>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>