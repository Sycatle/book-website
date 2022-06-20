<?php
$pageTitle = "Accueil";
$canGoBack = false;

ob_start(); ?>

<div id="banner" class="shapedividers_com-6318 ">
    <div class="carousel quote-carousel" data-flickity='{ "autoPlay": 7000 }'>
        <?php $quotes = $manager->getQuoteManager()->getQuotes();
        while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="quote-cell " style="background-color: <?= $row['category_color'] ?>">
                <div class="quote-content mx-auto my-auto">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p><?= $row['quote_text'] ?></p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            <a href="?r=author&&slug=<?= $row['author_slug'] ?>">
                                <span class="btn btn-secondary rounded-3" title="<?= $row['author_name'] ?>">
                                    <img class="rounded-3" src="./uploads/authors/<?= $row['author_slug'] ?>.webp" height="25px" alt=""> <?= $row['author_name'] ?>
                                </span>
                            </a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<section id="feed-section" class="container-fluid">
    <div class="sliding-section">
        <hr>
        <p class="title">Tendances</p>
        <div class="carousel book-carousel" data-flickity='{ "wrapAround": true, "autoPlay": 7000  }'>
            <?php while ($row = $books->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="book-cell text-center" style="background-color: <?= $row['category_color'] ?>">
                    <img class="book-img float-start rounded-3" src="./uploads/books/<?= $row['book_slug']; ?>.webp" height="225px">
                    <div class="book-content">
                        <h3 class="book-title">
                            <?= $row['book_title']; ?>
                        </h3>
                        <hr />
                        <span class="book-author">
                            <a href="?r=author&&slug=<?= $row['author_slug'] ?>">
                                <img class="rounded-3" src="./uploads/authors/<?= $row['author_slug']; ?>.webp" height="30px" width="30px"><?= $row['author_name']; ?>
                            </a>
                        </span>
                        <span class="book-gender">
                            <a href="?r=gender&&slug=<?= $row['category_slug'] ?>"><?= $row['category_name'] ?></a>
                        </span>
                        <a href="./?r=book&&slug=<?= $row['book_slug'] ?>" class="book-see btn btn-outline-secondary rounded-3 float-end">
                            Accéder
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="sliding-section mt-5">
        <hr>
        <p class="title">Trouver par genre</p>
        <div class="carousel book-carousel" data-flickity='{ "wrapAround": true, "autoPlay": 7000  }'>
            <?php while ($row = $genders->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="book-cell text-center" style="background-color: <?= $row['category_color'] ?>">
                    <a href="./?r=gender&&slug=<?= $row['category_slug'] ?>">
                        <?= $row['category_name']; ?>
                    </a>
                </div>

            <?php } ?>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>