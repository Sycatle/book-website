<?php
ob_start();
?>

<div class="container">
    <p>
        <a class="text-decoration-none" href='./?r=books'>
            <?= $pageTypeName ?>
        </a>
        >
        <a class="text-decoration-none" href="">
            <?= $book->getTitle() ?>
        </a>
    </p>

    <section id="book-section">
        <div class="book-main card rounded-3">
            <img class="book-main-cover" src="<?= $book->getCoverLink() ?>">

            <div class="book-main-infos">
                <h3 class="book-title"><?= $book->getTitle() ?></h3>
                <a href="./?r=author&&slug=<?= $book->getAuthor()->getSlug() ?>">
                    <?= $book->getAuthor()->getName() ?>
                </a>
                <a href="?r=gender&&slug=<?= $book->getGender()->getSlug() ?>">
                    <?= $book->getGender()->getName() ?>
                </a>

                <div class="book-main-actions my-5">
                    <a class="btn-like">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart align-middle me-2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="book-summary-wrapper py-3">
            <h3>Résumé</h3>
            <p><?= $book->getSummary() ?></p><br>
        </div>

        <span class="text-muted">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
            <?= $book->getViews(); ?> Vues
        </span>
    </section>

    <article class="py-3">
        <?php
        $sliderTitle = "De " . $book->getAuthor()->getName();
        $sliderRate = 0;
        $searchedBooks = $bookManager->getBooksByAuthor($book->getAuthor()->getId());
        include("./src/templates/contents/book_carousel.php");
        ?>
    </article>
</div>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>