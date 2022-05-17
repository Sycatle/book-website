<?php 
$pageTitle = "Mes réglages";

ob_start();
?>
<section id="settings-section">
</section>

<?php 
$content = ob_get_clean();
require("./views/layouts/layout.php");
?>