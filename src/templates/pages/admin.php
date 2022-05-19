<?php 
$pageTitle = "Administration";

ob_start();
?>
<section id="admin-section">
    <h1><?php echo($pageTitle);?></h1>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>