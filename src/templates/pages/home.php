<?php
$pageTitle = "Accueil";

ob_start(); ?>

<div id="banner">
    <img id="background-image" src="./assets/img/banner_edge.webp" width="100%">
</div>

<div id="feed-section" class="py-5">
    <h3 class="title">Hey <?php echo ($user->getFirstname()); ?>, retrouve tes livres préférés.</h3>
    <div class="carousel" data-flickity='{ "wrapAround": true }'>
        <?php $books = $manager->getBookManager()->getBooks();
        while ($row = $books->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="book-cell">
                <img class="book-img" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp">
                <div class="book-content">
                    <span class="book-title">
                        <?php echo $row['book_title']; ?>
                    </span>
                    <div class="rate">
                        <fieldset class="rating">
                            <input type="checkbox" id="star5" name="rating" value="5" />
                            <label class="full" for="star5"></label>
                            <input type="checkbox" id="star4" name="rating" value="4" />
                            <label class="full" for="star4"></label>
                            <input type="checkbox" id="star3" name="rating" value="3" />
                            <label class="full" for="star3"></label>
                            <input type="checkbox" id="star2" name="rating" value="2" />
                            <label class="full" for="star2"></label>
                            <input type="checkbox" id="star1" name="rating" value="1" />
                            <label class="full" for="star1"></label>
                        </fieldset>
                        <span class="book-voters">1.987 voters</span>
                    </div>
                    <div class="book-sum"><?php echo $row['book_description']; ?></div>
                    <a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="book-see btn btn-primary">En savoir plus</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>