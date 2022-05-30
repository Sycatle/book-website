<?php 
$pageTitle = "Bibliothèque";
$canGoBack = true;

ob_start();
?>
<section id="library-section">
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>