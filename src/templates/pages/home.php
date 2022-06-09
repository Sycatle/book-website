<?php
$pageTitle = "Accueil";
$canGoBack = false;

ob_start(); ?>

<div id="banner">
    <div class="carousel quote-carousel" data-flickity='{ "autoPlay": 7000 }'>
        <?php $quotes = $manager->getQuoteManager()->getQuotes();
        while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="quote-cell" style="background-color: <?= $row['category_color'] ?>">
                <div class="quote-content mx-auto my-auto">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p><?= $row['quote_text'] ?></p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            <a href="?r=author&&slug=<?= $row['author_slug'] ?>">
                                <span class="btn btn-secondary rounded-3" title="<?= $row['author_name'] ?>">
                                    <?= $row['author_name'] ?>
                                    <img class="rounded-3" src="./uploads/authors/<?= $row['author_slug'] ?>.webp" height="25px" alt="">
                                </span>
                            </a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<section id="feed-section">
    <h3 class="title">Recommandations pour vous</h3>
    <div class="carousel" data-flickity='{ "wrapAround": true }'>
        <?php $books = $manager->getBookManager()->getBooks();
        while ($row = $books->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="book-cell" style="border: 2px solid <?= $row['category_color'] ?>">
                <img class="book-img" src="./uploads/books/<?= $row['book_slug']; ?>.webp" height="225px">
                <div class="book-content">
                    <span class="book-title">
                        <?= $row['book_title']; ?>
                    </span>
                    <span class="book-author">
                        <?= $row['author_name']; ?>
                    </span>
                    <div class="book-sum">
                        <?= substr($row['book_description'], 0, 125) ?>..
                    </div>
                    <div class="book-gender">
                        <a href="?r=gender&&slug=<?= $row['category_slug'] ?>" style="color:<?= $row['category_color'] ?>;"><?= $row['category_name'] ?></a>
                    </div>
                    <a href="./?r=book&&slug=<?= $row['book_slug'] ?>" class="book-see btn" style="background-color: <?= $row['category_color'] ?>">Lire la suite</a>
                </div>
            </div>
        <?php } ?>
    </div>

    <h3 class="title">Hey
        <?= $user->getFirstname() ?>, retrouve tes livres préférés.
    </h3>
    <div class="carousel" data-flickity='{ "wrapAround": true }'>
        <?php $books = $manager->getBookManager()->getBooks();
        while ($row = $books->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="book-cell" style="border: 2px solid <?= $row['category_color'] ?>">
                <img class="book-img" src="./uploads/books/<?= $row['book_slug']; ?>.webp" height="225px">
                <div class="book-content">
                    <span class="book-title">
                        <?= $row['book_title']; ?>
                    </span>
                    <span class="book-author">
                        <?= $row['author_name']; ?>
                    </span>
                    <div class="book-sum">
                        <?= substr($row['book_description'], 0, 125) ?>..
                    </div>
                    <div class="book-gender">
                        <?= $row['category_name']; ?>
                    </div>
                    <a href="./?r=book&&slug=<?= $row['book_slug']; ?>" class="book-see btn" style="background-color: <?= $row['category_color'] ?>">Lire la suite</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>