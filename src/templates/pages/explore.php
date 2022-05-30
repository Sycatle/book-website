<?php
$pageTitle = "Explorer";
$pageTypeName = "Explorer";
$canGoBack = true;

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
		</div>
	</div>
</section>

<?php
$content = ob_get_clean();
require("./src/templates/template.php");
?>