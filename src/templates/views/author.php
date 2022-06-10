<?php

$pageTitle = $authorName;
$canGoBack = true;
$pageTypeName = "Auteurs";
$pageDescription = $authorDescription;

ob_start(); 
?>


<section id="author-section">
    <article class="d-flex row">
        <div class="author-cover col-3 mx-auto">
            <img src="./uploads/authors/<?= $authorSlug ?>.webp" height="200px">
        </div>
        <div class="author-title col-9 mx-auto">
            <h1><?= $authorName ?></h1><br>
            <p>Année de naissance: <?= $authorBirth ?></p>
            <p>Catégorie: <a href="./?r=gender&&slug=<?= $authorGenderSlug ?>"><?= $authorGender ?></a></p>
            <p><?= $authorDescription ?></p>
        </div>
    </article>
    <article class="py-2">
        <h3 class="title">Les livres de <?= $authorName ?></h3>
        <?php $booksByGender = $manager->getBookManager()->getBooksByAuthor($authorId);
                while($row = $booksByGender->fetch(PDO::FETCH_ASSOC)) { ?>
                    <a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="col-2"><img class="shadow-lg" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px" width="140px"></a>
        <?php } ?>
    </article>
    <article class="author-summary-wrapper py-2">
        <h3>Biographie</h3>
        <p><?= $authorBiography ?></p><br>
    </article>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>