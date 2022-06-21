<div class="carousel book-carousel" data-flickity='{ "wrapAround": true, "autoPlay": 7000  }'>
    <?php foreach ($searchedBooks as $book) {  ?>
        <div class="book-cell text-center bebl-<?= $book['gender_color'] ?>-bg">
            <img class="book-img float-start rounded-3" src="./uploads/books/<?= $book['book_slug'] ?>.webp" height="225px">
            <div class="book-content w-100">
                <p class="book-title">
                    <?= $book['book_title'] ?>
                </p>
                <hr />
                <span class="book-author">
                    <a href="./?=book&&slug=<?= $book['book_slug'] ?>">
                        <img class="rounded-3" src="./uploads/authors/<?= $book['author_slug'] ?>.webp" height="30px" width="30px"> 
                        <?= $book['author_name'] ?>
                    </a>
                </span>
                <p class="book-gender">
                    <a href="./?r=gender&&slug=<?= $book['gender_slug'] ?>">
                        <?= $book['gender_name'] ?>
                    </a>
                </p>
                <a href="./?r=book&&slug=<?= $book['book_slug'] ?>" class="btn btn-outline-light rounded-3">
                    Accéder
                </a>
            </div>
        </div>
    <?php } ?>
</div>

<?php /*
<div class="carousel book-carousel" data-flickity='{ "wrapAround": true, "autoPlay": 7000  }'>
    <?php foreach ($searchedBooks as $book) {  ?>
        <div class="book-cell text-center bebl-<?= $book->getGender()->getColor() ?>-bg">
            <img class="book-img float-start rounded-3" src="<?= $book->getCoverImage() ?>" height="225px">
            <div class="book-content w-100">
                <p class="book-title">
                    <?= $book->getTitle() ?>
                </p>
                <hr />
                <span class="book-author">
                    <a href="<?= $book->getAuthor()->getUrl() ?>">
                        <img class="rounded-3" src="<?= $book->getAuthor()->getImageLink() ?>" height="30px" width="30px"> 
                        <?= $book->getAuthor()->getName() ?>
                    </a>
                </span>
                <p class="book-gender">
                    <a href="<?= $book->getGender()->getUrl() ?>">
                        <?= $book->getGender()->getName() ?>
                    </a>
                </p>
                <a href="<?= $book->getUrl() ?>" class="btn btn-outline-light rounded-3">
                    Accéder
                </a>
            </div>
        </div>
    <?php } ?>
</div>
*/