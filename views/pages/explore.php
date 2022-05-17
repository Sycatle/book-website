<?php 
$pageTitle = "Explorer";

ob_start();
?>
<section id="explore-section">
	<script>
		<?php if (isset($_SESSION['id'])) { ?>
			sendNotification("Hey <?php echo $_SESSION['firstname']; ?>, bon retour parmis-nous !");
		<?php } ?>
	</script>

	<div id="banner" style="background-image: url('./public/img/banner.png')">
		<span>Je suis un élément de la bannière</span>
		<span>Je suis le deuxième élément de la bannière</span>
	</div>

	<div id="content-wrapper" class="container py-5">
		<div id="feed-section">
			<h3 class="title">Vous devriez jeter un coup d'oeil ⭐</h3>
			<div class="carousel" data-flickity='{ "wrapAround": true, "pageDots": false }'>
				<?php $books = $manager->getBookManager()->getBooks();
					while($row = $books->fetch(PDO::FETCH_ASSOC)) { ?>
				<a href="./?book=<?php echo $row['book_slug']; ?>" class="carousel-cell">
					<img class="book-thumb" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px"
						width="140px">
				</a>
				<?php } ?>
			</div>
		</div>

		<div id="author-section">
			<h3 class="title">Vous devriez suivre ces auteurs 📚</h3>
			<div class="carousel" data-flickity='{ "wrapAround": true, "pageDots": false }'>
				<?php $authorsByCategory = $manager->getAuthorManager()->getAuthorsByCategory(1);
					while($row = $authorsByCategory->fetch(PDO::FETCH_ASSOC)) { ?>
				<a href="./?author=<?php echo $row['author_slug']; ?>" class="col-2 carousel-cell">
					<img class="shadow-lg" src="./uploads/authors/<?php echo $row['author_slug']; ?>.webp"
						height="220px">
				</a>
				<?php } ?>
			</div>
		</div>

		<div id="love-section">
			<h3 class="title">Parce que vous aimez les livres de développement personnel 📚</h3>
			<div class="carousel" data-flickity='{ "wrapAround": true, "pageDots": false }'>
				<?php $booksByCategory = $manager->getBookManager()->getBooksByCategory(1);
					while($row = $booksByCategory->fetch(PDO::FETCH_ASSOC)) { ?>
				<a href="./?book=<?php echo $row['book_slug']; ?>" class="carousel-cell">
					<img class="book-thumb" src="./uploads/books/<?php echo $row['book_slug']; ?>.webp" height="220px"
						width="140px">
				</a>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<?php 
$content = ob_get_clean();
require("./views/layouts/layout.php");
?>