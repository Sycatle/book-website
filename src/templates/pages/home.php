<?php 
$pageTitle = "Accueil";

ob_start();?>

<div id="feed-section" class="py-5">
    <h3 class="title">Hey <?php echo($user->getFirstname()); ?>, retrouve tes livres préférés.</h3>
    <div class="carousel" data-flickity='{ "wrapAround": true }'>
        <?php $books = $manager->getBookManager()->getBooks();
            while($row = $books->fetch(PDO::FETCH_ASSOC)) { ?>
        <a href="./?book=<?php echo $row['book_slug']; ?>" class="carousel-cell">
            <img class="book-thumb" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px"
                width="140px">
        </a>
        <?php } ?>
    </div>
</div>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>