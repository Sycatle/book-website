<div class="sliding-section">
    <div id="selection-title">
        <p class="text-muted">TROUVEZ PAR </p>
        <h2 class="title" title="<?= $sliderTitle ?>"><?= $sliderTitle ?></h2>
    </div>
    <div class="carousel gender-carousel row" data-flickity='{ "wrapAround": true, "pageDots": false, "cellAlign": "left", "autoPlay": <?= $sliderRate ?>  }'>
        <?php while ($row = $searchedGenders->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="gender-cell text-center bebl-<?= $row['gender_color'] ?>-bg">
                <a class="w-100 h-100" href="./?r=gender&slug=<?= $row['gender_slug'] ?>">
                    <h3 class="w-100 h-100 d-flex justify-content-center align-items-center" title="<?= $row['gender_name'] ?>"><?= $row['gender_name'] ?></h3>
                </a>
            </div>

        <?php } ?>
    </div>
</div>