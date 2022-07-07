<div class="sliding-section">
    <div id="selection-title">
        <p class="text-muted">TROUVEZ PAR </p>
        <h3 class="title"><?= $sliderTitle ?></h3>
    </div>
    <div class="carousel gender-carousel" data-flickity='{ "wrapAround": true, "pageDots": false, "cellAlign": "left", "autoPlay": <?= $sliderRate ?>  }'>
        <?php while ($row = $searchedGenders->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="gender-cell text-center bebl-<?= $row['gender_color'] ?>-bg">
                <a class="w-100 h-100" href="./?r=gender&slug=<?= $row['gender_slug'] ?>">
                    <h2 class="w-100 h-100 d-flex justify-content-center align-items-center"><?= $row['gender_name']; ?></h2>
                </a>
            </div>

        <?php } ?>
    </div>
</div>