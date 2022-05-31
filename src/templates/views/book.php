<?php
$bookData = $bookManager->getBookData($_GET['slug']);
if ($bookData == null) header("Location: ./?error=404");

$bookTitle = $bookData['book_title'];
$bookSlug = $bookData['book_slug'];
$bookAuthor = $bookData['author_name'];
$bookAuthorId = $bookData['author_id'];
$bookAuthorSlug = $bookData['author_slug'];
$bookParution = $bookData['book_parution'];
$bookGender = $bookData['category_name'];
$bookGenderSlug = $bookData['category_slug'];
$bookDescription = $bookData['book_description'];
$bookSummary = $bookData['book_summary'];

$pageTitle = $bookTitle;
$pageTypeName = "Livres";
$canGoBack = true;
$pageDescription = $bookDescription;

ob_start();
?>

<section id="book-section" class="container">
    <article class="d-flex flex-row-lg">
        <div class="book-title col-6 col-sm-12">
            <h1><?php echo ($bookTitle); ?></h1>
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
            <hr>
            <p><?php echo ($bookDescription); ?></p>
        </div>
        <div class="book-cover col-6 col-sm-12">
            <img src="./uploads/books/<?php echo ($bookSlug); ?>.webp" height="300px">

            <p>Auteur: <a href="./?r=author&&slug=<?php echo ($bookAuthorSlug); ?>"><?php echo ($bookAuthor); ?></a></p>
            <p>Année de parution: <?php echo ($bookParution); ?></p>
            <p>Catégorie: <a href="./?r=gender&&slug=<?php echo ($bookGenderSlug); ?>"><?php echo ($bookGender); ?></a></p>
        </div>
    </article>
    <div class="book-summary-wrapper py-3">
        <h3>Résumé</h3>
        <p><?php echo ($bookSummary); ?></p><br>
    </div>
    <article class="py-3">
        <h3 class="title">Trouvez plus de livres de <?php echo ($bookAuthor); ?></h3>
        <?php $booksByAuthor = $manager->getBookManager()->getBooksByAuthor($bookAuthorId);
        while ($row = $booksByAuthor->fetch(PDO::FETCH_ASSOC)) {
            if ($row['book_slug'] != $bookSlug) { ?>
                <a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="col-2"><img class="shadow-lg" src="./uploads/books/<?php echo $row['slug']; ?>.webp" height="220px" width="140px"></a>
        <?php }
        } ?>
    </article>
</section>
<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>