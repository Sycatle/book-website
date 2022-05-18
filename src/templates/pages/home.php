<?php 
$pageTitle = "Accueil";

ob_start();?>
<section id="home-section">
    <h1>Home Section</h1>
</section>

<?php $content = ob_get_clean();
require("./src/templates/template.php");
?>