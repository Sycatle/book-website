<?php 
$pageTitle = "Bibliothèque";

ob_start();
?>
<section id="library-section">
    <h1>Library Section</h1>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>