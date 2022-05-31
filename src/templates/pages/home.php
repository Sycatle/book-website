<?php
$pageTitle = "Accueil";
$canGoBack = false;

ob_start(); ?>

<img id="background-image" src="./assets/img/light/home_banner.webp" alt="" width="100%">
<div id="banner">
    <div class="carousel quote-carousel" data-flickity='{ "autoPlay": 7000 }'>
        <?php $quotes = $manager->getQuoteManager()->getQuotes();
        while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="quote-cell">
                <div class="quote-content">
                    <h4 class="quote">
                        <img src="./assets/img/left_quote.png" height="20px"><?php echo $row['quote_text']; ?><img src="./assets/img/right_quote.png" height="20px">
                    </h4>
                    <div class="quote-author">Par <?php echo $row['author_name']; ?></div>
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
                        <span class="quote-voters">1.987 voters</span>
                    </div>
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
            <div class="book-cell">
                <img class="book-img" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp">
                <div class="book-content">
                    <span class="book-title">
                        <?php echo $row['book_title']; ?>
                    </span>
                    <span class="book-author">
                        <?php echo $row['author_name']; ?>
                    </span>
                    <span class="rate">
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
                        <span class="book-voters">(1.7k votes)</span>
                    </span>
                    <div class="book-sum"><?php echo substr($row['book_description'], 0, 125); ?>..</div>
                    <div class="book-gender"><?php echo $row['category_name']; ?></div>
                    <a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="book-see btn btn-primary">Lire la suite</a>
                </div>
            </div>
        <?php } ?>
    </div>

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
                    <span class="book-author">
                        <?php echo $row['author_name']; ?>
                    </span>
                    <span class="rate">
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
                        <span class="book-voters">(1.7k votes)</span>
                    </span>
                    <div class="book-sum"><?php echo substr($row['book_description'], 0, 125); ?>..</div>
                    <div class="book-gender"><?php echo $row['category_name']; ?></div>
                    <a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="book-see btn btn-primary">Lire la suite</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>