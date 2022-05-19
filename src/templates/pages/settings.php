<?php 
$pageTitle = "Réglages";

ob_start();
?>
<section id="settings-section">
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>