<?php 
$pageTitle = "Bibliothèque";

ob_start();
?>
<section id="library-section">
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>