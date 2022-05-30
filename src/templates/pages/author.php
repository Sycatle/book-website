<?php
$authorData = $authorManager->getAuthorData($_GET['slug']);
if ($authorData == null) header("Location: ./?error=404");

$authorId = $authorData['author_id'];
$authorName = $authorData['author_name'];
$authorSlug = $authorData['author_slug'];
$authorBirth = $authorData['author_birth'];
$authorDescription = $authorData['author_description'];
$authorCategory = $authorData['category_name'];
$authorCategorySlug = $authorData['category_slug'];
$authorBiography = $authorData['author_biography'];

$pageTitle = $authorName;
$pageTypeName = "Auteurs";
$pageDescription = $authorDescription;

ob_start(); 
?>


<section id="author-section">
    <article class="d-flex row">
        <div class="author-cover col-3 mx-auto">
            <img src="./uploads/authors/<?php echo($authorSlug); ?>.webp" height="200px">
        </div>
        <div class="author-title col-9 mx-auto">
            <h1><?php echo($authorName); ?></h1><br>
            <p>Année de naissance: <?php echo($authorBirth); ?></p>
            <p>Catégorie: <a href="./?r=category&&slug=<?php echo($authorCategorySlug); ?>"><?php echo($authorCategory); ?></a></p>
            <p><?php echo($authorDescription); ?></p>
        </div>
    </article>
    <article class="py-2">
        <h3 class="title">Les livres de <?php echo($authorName); ?></h3>
        <?php $booksByCategory = $manager->getBookManager()->getBooksByAuthor($authorId);
                while($row = $booksByCategory->fetch(PDO::FETCH_ASSOC)) { ?>
                    <a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="col-2"><img class="shadow-lg" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px" width="140px"></a>
        <?php } ?>
    </article>
    <article class="author-summary-wrapper py-2">
        <h3>Biographie</h3>
        <p><?php echo($authorBiography); ?></p><br>
    </article>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>