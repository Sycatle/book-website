<div class="carousel quote-carousel" data-flickity='{ "autoPlay": 7000 }'>
    <?php while ($row = $searchedQuotes->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="quote-cell bebl-<?= $row['gender_color'] ?>-bg">
            <div class="quote-content mx-auto my-auto">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <p><?= $row['quote_text'] ?></p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <a href="?r=author&&slug=<?= $row['author_slug'] ?>">
                            <span class="btn btn-outline-light rounded-3" title="<?= $row['author_name'] ?>">
                                <img class="rounded-3" src="./uploads/authors/<?= $row['author_slug'] ?>.webp" height="25px" alt=""> <?= $row['author_name'] ?>
                            </span>
                        </a>
                    </figcaption>
                </figure>
            </div>
        </div>
    <?php } ?>
</div>