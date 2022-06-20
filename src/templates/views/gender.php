<?php

$pageTitle = $genderName;
$canGoBack = true;
$pageTypeName = "Genres";

ob_start();
?>


<section id="category-section">
    <article class="card d-flex">
        <div class="category-title mx-auto">
            <h1><?= $genderName ?></h1>
            <p><?= $genderDescription ?></p>
        </div>
    </article>
    <article class="my-2 py-5">
        <h3 class="title">Trouvez plus de livres de <?= $genderName ?></h3>
        <div class="carousel book-carousel" data-flickity='{ "wrapAround": true }'>
            <?php $booksByGender = $manager->getBookManager()->getBooksByGender($genderId);
            while ($row = $booksByGender->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="book-cell" style="border: 2px solid <?= $row['category_color'] ?>">
                    <img class="book-img" src="./uploads/books/<?= $row['book_slug']; ?>.webp" height="225px">
                    <div class="book-content">
                        <h3 class="book-title">
                            <?= $row['book_title']; ?>
                        </h3>
                        <span>
                            <div class="book-author">
                                <a href="?r=author&&slug=<?= $row['author_slug'] ?>">
                                    <img class="rounded-3" src="./uploads/authors/<?= $row['author_slug']; ?>.webp" height="30px" width="30px"><?= $row['author_name']; ?>
                                </a>
                            </div>
                            <div class="book-gender">
                                <a href="?r=gender&&slug=<?= $row['category_slug'] ?>" style="color:<?= $row['category_color'] ?>;"><?= $row['category_name'] ?></a>
                            </div>
                        </span>
                        <div class="book-sum d-none d-lg-flex">
                            <?= substr($row['book_description'], 0, 200) ?>..
                        </div>

                        <a href="./?r=book&&slug=<?= $row['book_slug'] ?>" class="book-see btn" style="background-color: <?= $row['category_color'] ?>">Lire la suite</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </article>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>