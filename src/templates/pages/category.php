<?php
$categoryData = $categoryManager->getCategoryData($_GET['slug']);
if ($categoryData == null) header("Location: ./?error=404");

$categoryId = $categoryData['category_id'];
$categoryName = $categoryData['category_name'];
$categoryDescription = $categoryData['category_description'];

$pageTitle = $categoryName;
$pageTypeName = "Genres";

ob_start(); 
?>


<section id="category-section">
    <article class="d-flex">
        <div class="category-title mx-auto">
            <h1><?php echo($categoryName); ?></h1>
            <p><?php echo($categoryDescription); ?></p>
        </div>
    </article>
    <article class="py-5">
        <h3 class="title">Trouvez plus de livres de <?php echo($categoryName); ?></h3>
        <?php $booksByCategory = $manager->getBookManager()->getBooksByCategory($categoryId);
                while($row = $booksByCategory->fetch(PDO::FETCH_ASSOC)) { ?>
                    <a href="./?book=<?php echo $row['book_slug']; ?>" class="col-2"><img class="shadow-lg" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px" width="140px"></a>
        <?php } ?>
    </article>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>