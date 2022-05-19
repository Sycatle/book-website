<?php 
$pageTitle = "Réglages";

ob_start();
?>
<section id="settings-section">
    <h1><?php echo($pageTitle);?></h1>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>