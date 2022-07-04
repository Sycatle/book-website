<?php
if ($book != null) {
    $pageTitle = $book->getTitle();
    $pageDescription = $book->getDescription();
} else {
    $pageTitle = "Ajout d'un livre";
    $pageDescription = "Vous ne trouvez pas le livre que vous cherchez? Ajouter le !";
}
$pageTypeName = "Livres";
$canGoBack = true;
$book->incrementView();

ob_start();
?>

<section id="book-section" class="container">
    <p>
        <a class="text-decoration-none" href='./?r=books'> 
            <?= $pageTypeName ?>
        </a> 
        > 
        <a class="text-decoration-none" href="./?r=gender&&slug=<?= $book->getGender()->getSlug() ?>">
            <?= $book->getGender()->getName() ?>
        </a> 
        > 
        <span class="text-decoration-none">
            <?= $book->getTitle() ?>
        <span>
    </p>
    <article class="card d-flex">
        <div class="book-title flex-column ">
            <h1><?= $book->getTitle() ?></h1>
            <hr>
            <p><?= $book->getDescription() ?></p>
        </div>
        <div class="book-informations container col-lg-3 flex-column float-end">
            <img src="<?= $book->getCoverLink() ?>" height="250px">
            <div id="book-data"> 
                <a class="book-author " href="./?r=author&&slug=<?= $book->getAuthor()->getSlug() ?>" style="text-decoration:none;border-radius:15px;background-color:gray">
                    <span class="text-white d-flex p-1 mx-2"><img class="rounded-3" src="<?= $book->getAuthor()->getImageLink() ?>" height="30px" width="30px">
                    <?= $book->getAuthor()->getName() ?></span>
                </a>
                <a class="book-gender text-white d-flex bebl-<?= $book->getGender()->getColor() ?>-bg" href="?r=gender&&slug=<?= $book->getGender()->getSlug() ?>">
                    <span class="text-white d-flex p-1 mx-2"><?= $book->getGender()->getName() ?></span>
                </a>
                <div class="book-date text-white d-flex" style="text-decoration:none;border-radius:15px;background-color:gray">
                    <span class="text-white d-flex p-1 mx-2"> Sorti en <?= $book->getParutionDate() ?></span>
                </div>
            </div>
        </div>

    </article>
    <span class="text-muted">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        <?= $book->getViews(); ?> Vues
    </span>
    <div class="book-summary-wrapper py-3">
        <h3>Résumé</h3>
        <p><?= $book->getSummary() ?></p><br>
    </div>
    <article class="py-3">
        <?php
        $sliderTitle = "De " . $book->getAuthor()->getName();
        $sliderRate = 0;
        $searchedBooks = $bookManager->getBooksByAuthor($book->getAuthor()->getId());
        include("./src/templates/contents/book_carousel.php");
        ?>
    </article>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>