<div class="sliding-section">
    <div id="selection-title">
        <p class="text-muted">NOTRE SELECTION DE LIVRES</p>
        <h2 class="title" title="<?= $sliderTitle ?>"><?= $sliderTitle ?></h2>
    </div>
    <div class="carousel book-carousel row" height="200px" data-flickity='{ "wrapAround": true, "cellAlign": "left", "dragThreshold": "30", "pageDots": false, "resize": true, "autoPlay": <?= $sliderRate ?>  }'>
        <?php foreach ($searchedBooks as $book) {  ?>
            <div class="book-cell d-flex">
                <a href="./book/<?= $book['book_slug'] ?>" title="<?= $book['book_title'] ?>"><img class="cell-image" src="./uploads/books/<?= $book['book_slug'] ?>.webp"></a>
                <div class="cell-content w-100">
                    <div class="cell-header d-flex my-1 row">
                        <span class="cell-title col-10 my-auto">
                            <a href="./book/<?= $book['book_slug'] ?>" title="<?= $book['book_title'] ?>">
                                <?= $book['book_title'] ?>
                            </a> 
                            <a class="text-muted" href="./author/<?= $book['author_slug'] ?>" title="<?= $book['author_name'] ?>">
                               <small> <?= $book['author_name'] ?></small>
                            </a>
                        </span>
                        <div class="btn-group col-2">
                            <button class="btn-more" type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" title="Plus d'informations">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle me-2">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </button>
                            <ul class="dropdown-menu fade dropdown-menu-end mt-2 me-2">
                                <li><a class="dropdown-item disabled">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus align-middle me-2">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Ajouter à une liste
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="./author/<?= $book['author_slug'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check align-middle me-2">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <polyline points="17 11 19 13 23 9"></polyline>
                                        </svg>
                                        Accéder à l'auteur
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="./gender/<?= $book['gender_slug'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag align-middle me-2">
                                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                                        </svg>
                                        Accéder au genre
                                    </a>
                                </li>
                                <?php if (isset($user) && $user != null && $user->hasPermission("access_admin")) { ?>
                                    <li><a class="dropdown-item bebl-yellow-color" href="./book/<?php echo $book['book_slug'] ?>&&a=share">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle me-2">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            Modifier
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item bebl-red-color" href="./book/<?php echo $book['book_slug'] ?>&&a=share">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle me-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            Supprimer
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="book-gender mt-2">
                        <a class="rounded-pill" href="./gender/<?= $book['gender_slug'] ?>" title="<?= $book['gender_name'] ?>">
                            <?= $book['gender_name'] ?>
                        </a>
                    </div>
                    <div class="cell-footer justify-content-center align-items-center mt-auto mx-auto">
                        <a class="btn-like ms-auto mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart align-middle me-2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </a>
                        <a href="./book/<?= $book['book_slug'] ?>" class="btn-access mx-1" title="Accéder">
                            Accéder
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right align-middle">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
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