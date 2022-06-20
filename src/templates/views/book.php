<?php
$pageTitle = $bookTitle;
$pageTypeName = "Livres";
$canGoBack = true;
$pageDescription = $bookDescription;
$pageArbo = "<a href='./?r=books'> $pageTypeName </a> > <a href='./?r=gender&&slug=$bookGenderSlug'>$bookGender</a> > <a href=''>$bookTitle<a>"; 

ob_start();
?>

<section id="book-section" class="container">
    <p>
        <a class="text-decoration-none" href='./?r=books'> 
            <?= $pageTypeName ?>
        </a> 
        > 
        <a class="text-decoration-none" href="./?r=gender&&slug=<?= $bookGenderSlug ?>">
            <?= $bookGender ?>
        </a> 
        > 
        <a class="text-decoration-none" href=''>
            <?= $bookTitle ?>
        <a>
    </p>
    <article class="card d-flex">
        <div class="book-title flex-column ">
            <h1><?= $bookTitle ?></h1>
            <hr>
            <p><?= $bookDescription ?></p>
        </div>
        <div class="book-informations container flex-column float-end">
            <img src="./uploads/books/<?= $bookSlug ?>.webp" height="250px">
            <div id="book-data"> 
                <a class="book-author " href="./?r=author&&slug=<?= $bookAuthorSlug ?>" style="text-decoration:none;border-radius:15px;background-color:gray">
                    <span class="text-white d-flex p-1 mx-2"><img class="rounded-3" src="./uploads/authors/<?= $bookAuthorSlug ?>.webp" height="30px" width="30px">
                    <?= $bookAuthor ?></span>
                </a>
                <a class="book-gender text-white d-flex" href="?r=gender&&slug=<?= $bookGenderSlug ?>" style="text-decoration:none;border-radius:15px;background-color:<?= $bookGenderColor ?>;">
                    <span class="text-white d-flex p-1 mx-2"><?= $bookGender ?></span>
                </a>
                <div class="book-date text-white d-flex" style="text-decoration:none;border-radius:15px;background-color:gray">
                    <span class="text-white d-flex p-1 mx-2"> Sorti en <?= $bookParution ?></span>
                </div>
            </div>
        </div>

    </article>
    <div class="book-summary-wrapper py-3">
        <h3>Résumé</h3>
        <p><?= $bookSummary ?></p><br>
    </div>
    <article class="py-3">
        <h3 class="title">Trouvez plus de livres de <?= $bookAuthor ?></h3>
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