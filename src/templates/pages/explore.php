<?php 
$pageTitle = "Explorer";

ob_start();
?>
<section id="explore-section">
    <h1>Explore Section</h1>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>