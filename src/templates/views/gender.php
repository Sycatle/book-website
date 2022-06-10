<?php

$pageTitle = $categoryName;
$canGoBack = true;
$pageTypeName = "Genres";

ob_start(); 
?>


<section id="category-section">
    <article class="d-flex">
        <div class="category-title mx-auto">
            <h1><?= $categoryName ?></h1>
            <p><?= $categoryDescription ?></p>
        </div>
    </article>
    <article class="py-5">
        <h3 class="title">Trouvez plus de livres de <?= $categoryName ?></h3>
        <?php $booksByGender = $manager->getBookManager()->getBooksByGender($categoryId);
                while($row = $booksByGender->fetch(PDO::FETCH_ASSOC)) { ?>
                    <a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="col-2"><img class="shadow-lg" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px" width="140px"></a>
        <?php } ?>
    </article>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>