<?php
$pageTitle = "Explorer";
$pageTypeName = "Explorer";
$canGoBack = true;

ob_start();
?>
<section id="explore-section">
	<div id="feed-section">
		<?php
		$sliderTitle = "Les livres en tendances";
		$sliderRate = 16000;
		$searchedBooks = $manager->getBookManager()->getBooks(9);
		include("templates/contents/book_carousel.php");
		?>
	</div>
</section>

<?php
$content = ob_get_clean();
require("templates/template.php");
?>