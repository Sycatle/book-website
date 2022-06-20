<div class="carousel book-carousel" data-flickity='{ "wrapAround": true, "autoPlay": 7000  }'>
    <?php while ($row = $searchedBooks->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="book-cell text-center" style="background-color: <?= $row['gender_color'] ?>">
            <img class="book-img float-start rounded-3" src="./uploads/books/<?= $row['book_slug']; ?>.webp" height="225px">
            <div class="book-content">
                <h3 class="book-title">
                    <?= $row['book_title']; ?>
                </h3>
                <hr />
                <span class="book-author">
                    <a href="?r=author&&slug=<?= $row['author_slug'] ?>">
                        <img class="rounded-3" src="./uploads/authors/<?= $row['author_slug']; ?>.webp" height="30px" width="30px"><?= $row['author_name']; ?>
                    </a>
                </span>
                <span class="book-gender">
                    <a href="?r=gender&&slug=<?= $row['gender_slug'] ?>"><?= $row['gender_name'] ?></a>
                </span>
                <a href="./?r=book&&slug=<?= $row['book_slug'] ?>" class="book-see btn btn-outline-secondary rounded-3 float-end">
                    Accéder
                </a>
            </div>
        </div>
    <?php } ?>
</div>