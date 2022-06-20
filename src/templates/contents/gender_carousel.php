<div class="carousel book-carousel" data-flickity='{ "wrapAround": true, "autoPlay": 7000  }'>
    <?php while ($row = $searchedGenders->fetch(PDO::FETCH_ASSOC)) { ?>

        <div class="book-cell text-center" style="background-color: <?= $row['gender_color'] ?>">
            <a href="./?r=gender&&slug=<?= $row['gender_slug'] ?>">
                <?= $row['gender_name']; ?>
            </a>
        </div>

    <?php } ?>
</div>