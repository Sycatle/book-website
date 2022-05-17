<?php 
$pageTitle = "Panel d'admininistration";

ob_start();
?>
<section id="admin-section">
</section>

<?php 
$content = ob_get_clean();
require("./views/layouts/layout.php");
?>