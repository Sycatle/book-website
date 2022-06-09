<?php
$pageTitle = $bookTitle;
$pageTypeName = "Livres";
$canGoBack = true;
$pageDescription = $bookDescription;

ob_start();
?>

<section id="book-section" class="container">
    <article class="d-flex flex-row-lg card">
        <div class="book-cover flex-column col-3 col-xs-12">
            <img src="./uploads/books/<?php echo ($bookSlug); ?>.webp" height="300px">

            <p>Auteur: <a href="./?r=author&&slug=<?php echo ($bookAuthorSlug); ?>"><?php echo ($bookAuthor); ?></a></p>
            <p>Année de parution: <?php echo ($bookParution); ?></p>
            <p>Catégorie: <a href="./?r=gender&&slug=<?php echo ($bookGenderSlug); ?>"><?php echo ($bookGender); ?></a></p>
        </div>
        <div class="book-title col-9 col-xs-12">
            <h1><?php echo ($bookTitle); ?></h1>
            <hr>
            <p><?php echo ($bookDescription); ?></p>
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