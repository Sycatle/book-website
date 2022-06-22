<div class="carousel book-carousel" data-flickity='{ "wrapAround": true, "autoPlay": 5000  }'>
    <?php while ($row = $searchedGenders->fetch(PDO::FETCH_ASSOC)) { ?>

        <div class="book-cell text-center align-items-center bebl-<?= $row['gender_color'] ?>-bg">
            <a class="w-100 h-100" href="./?r=gender&&slug=<?= $row['gender_slug'] ?>">
                <span><?= $row['gender_name']; ?></span>
            </a>
        </div>

    <?php } ?>
</div>