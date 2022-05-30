<?php
$pageTitle = "Explorer";
$pageTypeName = "Explorer";

ob_start();
?>
<section id="explore-section">

	<div id="content-wrapper" class="container py-5">
		<div id="feed-section">
			<h3 class="title">Vous devriez jeter un coup d'oeil ⭐</h3>
			<div class="carousel" data-flickity='{ "wrapAround": true }'>
				<?php $books = $manager->getBookManager()->getBooks();
				while ($row = $books->fetch(PDO::FETCH_ASSOC)) { ?>
					<div class="book-cell">
						<img class="book-img" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp">
						<div class="book-content">
							<span class="book-title">
								<?php echo $row['book_title']; ?>
							</span>
							<div class="rate">
								<fieldset class="rating">
									<input type="checkbox" id="star5" name="rating" value="5" />
									<label class="full" for="star5"></label>
									<input type="checkbox" id="star4" name="rating" value="4" />
									<label class="full" for="star4"></label>
									<input type="checkbox" id="star3" name="rating" value="3" />
									<label class="full" for="star3"></label>
									<input type="checkbox" id="star2" name="rating" value="2" />
									<label class="full" for="star2"></label>
									<input type="checkbox" id="star1" name="rating" value="1" />
									<label class="full" for="star1"></label>
								</fieldset>
								<span class="book-voters">1.987 voters</span>
							</div>
							<div class="book-sum"><?php echo $row['book_description']; ?></div>
							<a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="book-see btn btn-primary">En savoir plus</a>
						</div>
					</div>
				<?php } ?>
			</div>
			<div id="author-section">
				<h3 class="title">Vous devriez suivre ces auteurs 📚</h3>
				<div class="carousel" data-flickity='{ "wrapAround": true }'>
					<?php $authorsByCategory = $manager->getAuthorManager()->getAuthorsByCategory(1);
					while ($row = $authorsByCategory->fetch(PDO::FETCH_ASSOC)) { ?>
						<div class="book-cell">
							<a href="./?r=author&&name=<?php echo $row['author_slug']; ?>" class="col-2 carousel-cell">
								<img class="shadow-lg" src="./uploads/authors/<?php echo $row['author_slug']; ?>.webp" height="220px">
							</a>
						<?php } ?>
						</div>
				</div>
			</div>
			<div id="love-section">
				<h3 class="title">Parce que vous aimez les livres de développement personnel 📚</h3>
				<div class="carousel" data-flickity='{ "wrapAround": true, "pageDots": false }'>
					<?php $booksByCategory = $manager->getBookManager()->getBooksByCategory(1);
					while ($row = $booksByCategory->fetch(PDO::FETCH_ASSOC)) { ?>
						<a href="./?r=book&&slug=<?php echo $row['book_slug']; ?>" class="carousel-cell">
							<img class="book-thumb" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px" width="140px">
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>