<?php 
$pageTitle = "Poster";

ob_start();
?>
<section id="post-section">
    <h1>Post Section</h1>
</section>

<?php 
$content = ob_get_clean();
require("./src/templates/template.php");
?>