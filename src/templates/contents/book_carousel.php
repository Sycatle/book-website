<div class="sliding-section">
    <div id="selection-title">
        <p class="text-muted">NOTRE SELECTION DE LIVRES</p>
        <h2 class="title" title="<?= $sliderTitle ?>"><?= $sliderTitle ?></h2>
    </div>
    <div class="carousel book-carousel row" height="200px" data-flickity='{ "wrapAround": true, "cellAlign": "left", "dragThreshold": "30", "pageDots": false, "resize": true, "autoPlay": <?= $sliderRate ?>  }'>
        <?php foreach ($searchedBooks as $book) {  ?>
            <div class="book-cell d-flex">
                <a class="mx-auto" href="./book/<?= $book['book_id'] ?>" title="<?= $book['book_title'] ?>"><img class="cell-image" src="./uploads/books/<?= $book['book_slug'] ?>.webp"></a>
                <?php /* <!-- <div class="cell-content w-100">
                    <div class="cell-header d-flex my-1 row">
                        <span class="cell-title col-10 my-auto">
                            <a href="./book/<?= $book['book_id'] ?>" title="<?= $book['book_title'] ?>">
                                <?= $book['book_title'] ?>
                            </a> 
                            <a class="text-muted" href="./author/<?= $book['author_id'] ?>" title="<?= $book['author_name'] ?>">
                               <small> <?= $book['author_name'] ?></small>
                            </a>
                        </span>
                    </div>
                    <div class="book-gender mt-2">
                        <a class="rounded-pill" href="./gender/<?= $book['gender_id'] ?>" title="<?= $book['gender_name'] ?>">
                            <?= $book['gender_name'] ?>
                        </a>
                    </div>
                    <div class="cell-footer justify-content-center align-items-center mt-auto mx-auto">
                        <a class="btn-like ms-auto mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart align-middle me-2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </a>
                        <a href="./book/<?= $book['book_id'] ?>" class="btn-access mx-1" title="Accéder">
                            Accéder
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right align-middle">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    </div>
                </div> --> */ ?>
            </div>
        <?php } ?>
    </div>
</div>

<?php /* FUTUR CAROUSEL AVEC POO
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