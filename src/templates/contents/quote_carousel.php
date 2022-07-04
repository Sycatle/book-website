<div class="carousel quote-carousel" data-flickity='{ "autoPlay": 6000, "fade": true, "prevNextButtons": false }'>
    <?php while ($row = $searchedQuotes->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="quote-cell bebl-<?= $row['gender_color'] ?>-bg">
            <div class="quote-content mx-auto my-auto">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <p><?= $row['quote_text'] ?></p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <a href="?r=author&&slug=<?= $row['author_slug'] ?>">
                            <span title="<?= $row['author_name'] ?>">
                                <?= $row['author_name'] ?>
                            </span>
                        </a>
                    </figcaption>
                </figure>
            </div>
        </div>
    <?php } ?>
</div>