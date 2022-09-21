<?php
$pageTitle = "Poster du contenu";
$canGoBack = true;

ob_start();
?>
<div class="container">
    <section id="post-section" class="">
        <h2 class="mx-auto py-5 text-center">Vous souhaitez poster un(e)..</h2>

        <ul class="nav nav-pills mx-auto" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <img src="./assets/img/book.png" draggable="false">
                    <span class="label">Livre</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <img src="./assets/img/quotation.png" draggable="false">
                    <span class="label">Citation</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                    <img src="./assets/img/author.png" draggable="false">
                    <span class="label">Auteur(e)</span>
                </button>
            </li>
        </ul>
        <div class="d-flex mx-auto">

            <?php if (isset($errorMessage)) { ?>
                <p class="alert alert-danger text-center mx-auto"><?= $errorMessage ?></p>
            <?php } ?>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form class="form-group my-auto mx-auto text-light " method="POST" name="post_book" enctype="multipart/form-data">
                        <label>Nom du livre:</label>
                        <input type="text" name="book_name" class="form-control" placeholder="Comment s'appelle le livre que vous souhaitez poster ?" required>
                        <label>Auteur(e) du livre:</label>
                        <select name="book_author" class="form-control" required>
                            <?php $authors = $manager->getAuthorManager()->getAuthors();
                            while ($row = $authors->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row['author_id']; ?>"><?php echo $row['author_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label>Année de parution:</label>
                        <input type="number" min="0" max="2022" name="book_parution" class="form-control" placeholder="En quelle année est paru ce livre?" value="dd-mm-yyyy" required>
                        <label>Genre(s) littéraire(s) du livre:</label>
                        <select name="book_gender" class="form-control" required>
                            <?php $genders = $manager->getGenderManager()->getGenders();
                            while ($row = $genders->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row['gender_id']; ?>"><?php echo $row['gender_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label>Nombre de page(s) du livre:</label>
                        <input type="number" name="book_pages" class="form-control" placeholder="Combien de pages?" required>
                        <label>Description du livre:</label>
                        <input type="text" name="book_description" class="form-control" placeholder="Rédigez une description courte de ce livre." required>
                        <label>Résumé du livre:</label>
                        <input type="text" name="book_summary" class="form-control" placeholder="Rédigez le résumé du livre." required>
                        <label>Couverture du livre:</label>
                        <input type="file" name="book_cover" class="form-control-file" required>

                        <button type="submit" name="post_book" class="btn btn-primary mx-auto my-3">
                            Poster
                        </button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form class="form-group my-auto mx-auto text-light " method="POST" name="post_quote">
                        <label>Quelle est la citation:</label>
                        <input type="text" name="quote_name" class="form-control" placeholder="Quelle est la citation que vous souhaitez poster ?" required>
                        <label>Auteur(e) de la citation:</label>
                        <select name="quote_author" class="form-control" required>
                            <?php $authors = $manager->getAuthorManager()->getAuthors();
                            while ($row = $authors->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row['author_id']; ?>"><?php echo $row['author_name']; ?></option>
                            <?php } ?>
                        </select><label>Genre(s) littéraire(s) de la citation:</label>
                        <select name="quote_gender" class="form-control" required>
                            <?php $genders = $manager->getGenderManager()->getGenders();
                            while ($row = $genders->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row['gender_id']; ?>"><?php echo $row['gender_name']; ?></option>
                            <?php } ?>
                        </select>

                        <button type="submit" name="post_quote" class="btn btn-primary mx-auto my-3">
                            Poster
                        </button>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <form class="form-group my-auto mx-auto text-light " method="POST" name="post_author" enctype="multipart/form-data">
                        <label>Nom de l'auteur(e):</label>
                        <input type="text" name="author_name" class="form-control" placeholder="Comment s'appelle l'auteur que vous souhaitez poster ?" required>
                        <label>Date de naissance de l'auteur(e):</label>
                        <input type="date" name="author_birth" class="form-control" placeholder="Quelle est la date de naissance de l'auteur(e)?" required>
                        <label>Genre(s) littéraire(s) de l'auteur(e):</label>
                        <select name="author_gender" class="form-control" required>
                            <?php $genders = $manager->getGenderManager()->getGenders();
                            while ($row = $genders->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row['gender_id']; ?>"><?php echo $row['gender_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label>Description de l'auteur(e):</label>
                        <input type="text" name="author_description" class="form-control" placeholder="Insérer une description courte de l'auteur(e)." required>
                        <label>Biographie de l'auteur(e):</label>
                        <input type="text" name="author_biography" class="form-control" placeholder="Insérer la biographie de l'auteur." required>
                        <label>Photographie de l'auteur(e):</label>
                        <input type="file" name="author_picture" class="form-control-file" required>

                        <button type="submit" name="post_author" class="btn btn-primary mx-auto my-3">
                            Poster
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
$content = ob_get_clean();
require("templates/template.php");
?>