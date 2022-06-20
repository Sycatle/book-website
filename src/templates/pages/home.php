<?php
$pageTitle = "Accueil";
$canGoBack = false;

ob_start(); ?>

<div id="banner" class="shapedividers_com-6318 ">
    <div class="carousel quote-carousel" data-flickity='{ "autoPlay": 7000 }'>
        <?php $quotes = $manager->getQuoteManager()->getQuotes();
        while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="quote-cell " style="background-color: <?= $row['gender_color'] ?>">
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
        <p class="title">Les livres en tendances</p>
        <?php 
        $searchedBooks = $manager->getBookManager()->getBooks(9);
        include("./src/templates/contents/book_carousel.php"); 
        ?>
    </div>

    <div class="sliding-section mt-5">
        <hr>
        <p class="title">Trouver par genre</p>
        <?php
        $searchedGenders = $manager->getGenderManager()->getGenders(9);
        include("./src/templates/contents/gender_carousel.php");
        ?>
    </div>
</section>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>